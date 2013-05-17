<?php

// ===========================================================================================
//
// Hangman.php
//
// Description: Play the classic game of hangman.
//
// Author: Ralf Eriksson
//


// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";//var for debugging
$debugEnable = FALSE; //var for enabel debug output

// Remove NOTICE error message, define the variable before its used
$svgCode = "";
$action = "";
$ralf = "";

$errorMsg = "";
// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
//$word 		= empty($_GET['word'])    ? rand(0, 9) : $_GET['word'];//fix a random number to get a word from the words array
$guessed 	= empty($_GET['guessed']) ? "" : $_GET['guessed'];//fix so you can save the guessed chars in this var
$char		= empty($_GET['char'])    ? "" : $_GET['char'];//get the guessed char from the form

//check so that the input char is really a letter in the alphabet if not write a error message
if(preg_match('([a-öA-Ö])', $char) or $char === '' ){
    
    $guessed .= $char;//add chars to guessed var so you can save the guessed chars 
    $guessed = count_chars($guessed, 3);//count character in string guessed ( second param. 3 means a string containing all unique characters is returned.)

    //get the output variabel if not set make it 0 else get the value from output var
    $output = (empty($_GET['output']) ? "0" : $_GET['output']);
    if($output == 1){//if value of output equals 1 make debug enable
            $debugEnable = TRUE;
    }
    
   $debug .= "char = {$char}<br />";  
   $debug .= "guessed = {$guessed}<br />";
}else{
    $errorMsg .= 'Please make sure you enter a character!';
}//end if else

// hemliga ordet
$theWord = 'KAJSAVARG';

$debug .= $theWord;//add the word to debug var

// -------------------------------------------------------------------------------------------
//
// Show the string and the chars that are correct, else _
//
$nrChars = strlen($theWord); //get the secret word lenght
$currentWord = ""; //set currenWord to null

for($i=0; $i<$nrChars; $i++) {
	
	if(stripos($guessed, $theWord[$i]) === FALSE) { //check if the guessed char is represented in the secret word
		$currentWord .= '-';                    //if not add a line to currenword
	} else {
		$currentWord .= strtoupper($theWord[$i]); //if guessed char is represented in the secret word add it to the currenWord
	}
}//end forloop


// -------------------------------------------------------------------------------------------
//
// Check state of game:
// count number of failed attempts
//
$charsGuessed = strlen(count_chars($guessed, 3)); //count the chars in var guessed, all unique characters is returned
/*count the number of chars in currentword 
after removing all the dashes. The last parameter 3 make 
all the unique characters returned*/
$charsHit = strlen(count_chars((str_replace('-', '', $currentWord)), 3));
$failed = $charsGuessed - $charsHit;// count the failed guesses                    

$debug .= $failed . $charsGuessed . $charsHit;

// -------------------------------------------------------------------------------------------
//
// Check state of game:
// if all chars are right, then success!
//
$disableButton 		= "";
$gameOverMessage	= "";
//check if every dashes are removed from the currentword if so disable button and write a gratulation message
if(strpos($currentWord, '-') === FALSE) {
	$disableButton = "disabled='disabled'";
	$gameOverMessage = "Game over! you made it.";
	$debug .= "yes";
        $action = " <a href='../room.php?id=4'>Gå tillbaka till grottan!</a>";
}

$debug .= $currentWord;
$debug .= strpos($currentWord, "-");

// -------------------------------------------------------------------------------------------
//
// Check state of game:
// if failed nine times, then hanged, game over.
//
if($failed >= 9) {//if you have more then 9 guesses you fail and a sorry message is printed
	$disableButton	= "disabled='disabled'";
	$gameOverMessage = "Tyvärr du lyckades inte.";
        $ralf = " <a href='{$_SERVER['PHP_SELF']}'>Starta om!</a>";
}


// -------------------------------------------------------------------------------------------
//
// Create a form for managing input.
//
$form = <<< EOD
<p style="font-size: 24px; color:white;  text-transform: uppercase; ">
    {$currentWord} 
</p>
    
<form action='hangman.php' method='get' name='letters'>    
    <input type='hidden' name='guessed' value='{$guessed}' />
    <div class="inputGuess">
        <input type='text' name='char' tabindex='1' size='1' maxlength='1'/>       
        <div class="submit" {$disableButton}>
		<input type="submit" value="Gissa" />
	</div>
    </div>
    
</form>   

EOD;


// -------------------------------------------------------------------------------------------
//
// Create html for drawing the hanging man.
//
require_once('RalfHangmanSVG.php');//class for managing the hangman svg picture

$charset 	= "iso-8859-1";
$language	= "sv";
$title		= "Hangman";
$debug 		= $debugEnable ? $debug : "";

$hangman = new RalfHangmanSVG();//make an instance of the class

$svgCode.= $hangman->DrawPartsOfPicture($failed);//call the draw method depending on how many missed chars you have

$kidpic = <<<EOD
        
       <div id='kid'></div>
EOD;
//
// The content of the page
//

$html = <<<EOD

<div class='wrapper'>
    <div class="header">
        <h1>Hänga gubbe</h1>
     
    </div>

    <div id="main">
        <div class='gameareaHangman'>
             {$kidpic}
        <div id="formHangman">
            {$form}
        </div><!-- formHangman -->
        <div id="svgHangman">    
            {$svgCode}                 
        </div><!-- svgHangman -->        
          <div id="guessLetters">      
             <h3>Gissade bokstäver: {$guessed} </h3>               
              <h4>{$gameOverMessage}</h4> 
              <h4>{$errorMsg}</h4>              
         </div><!-- end guessLetters -->         
        </div> <!-- gameareaHangman -->
        <div id="right_col">
            <div class='helthmeter'>
              <h3>Hälsa</h3>  
             <div class='action'></div>
            </div>
            <div class='description'>
            <h3>Beskrivning</h3>
                <p class='description'>
                    Gissa rätt ord nu så du kan du fortsätta spelet
                </p>
            </div> <!-- description -->
                <div class='action'>
                    <h3>Vägval</h3>
                <p class='action'>
                    {$action}
                  </p>
                </div> <!-- actions -->                       
                <div class='actionEvents'>
                    <h3>Händelser</h3>    
                    <p class='action'>
                        {$ralf}
                    </p>                         
                </div> <!-- actions --> 
        </div> <!-- end right_col-->
    </div> <!-- main -->    
</div> <!-- wrapper -->

EOD;


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
$debug = $debugEnable ? $debug : "";

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset={$charset};" />
		<title>{$title}</title>
		<link href="../css/main.css" rel="stylesheet" type="text/css" />
                <link href="styleHangman.css" rel="stylesheet" type="text/css" />
	</head>
	<body OnLoad='document.letters.char.focus();'>	
          {$html}
            <div class = "debug">{$debug}</div>
	</body>
</html>
EOD;
header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;
?>