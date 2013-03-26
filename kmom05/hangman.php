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

$errorMsg = "";
// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$word 		= empty($_GET['word'])    ? rand(0, 9) : $_GET['word'];//fix a random number to get a word from the words array
$guessed 	= empty($_GET['guessed']) ? "" : $_GET['guessed'];//fix so you can save the guessed char so you can save the in this var
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
    $debug .= "word = {$word}<br />";
    $debug .= "guessed = {$guessed}<br />";
}else{
    $errorMsg .= 'Please make sure you enter a character!';
}//end if else

// -------------------------------------------------------------------------------------------
//
// Create a wordlist and pich the word.
//
$words = Array(
	'pellefant',
	'moped',
	'asket',
	'tant',
	'fotboll',
	'programvaruteknik',
	'webb',
	'databaser',
	'php',
	'xhmtl',
	);

$theWord = $words[$word];//put the secretword from list to theWord var

$debug .= $theWord;//add the word to debug var

$debug .= "Ordlista: " . implode(', ', $words) . "<br />";
$debug .= "Valt ord: '{$theWord}'<br />";

$debug .= "Ordens respektive längd: ";
foreach($words as $w) {
    $debug .= "{$w} (" . strlen($w) . "), ";
}
$debug .= "<br />";

$ny = asort($words);
$debug .= "Sorterad: " . implode(', ', $words) . "<br />";

$antal = count($words);
$debug .= "Antal element: {$antal}<br />";

$ny = shuffle($words);
$debug .= "Skakad: " . implode(', ', $words) . "<br />";

$slump = array_rand($words);
$debug .= "Slumpord: {$words[$slump]} ({$slump})<br />";


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
		$currentWord .= $theWord[$i]; //if guessed char is represented in the secret word add it to the currenWord
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
	$gameOverMessage = "Thank you for saving my life!<br/>Try again!";
	$debug .= "yes";
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
	$gameOverMessage = "Sorry, you didn't manage to save me this time.<br/>Try again?";
}


// -------------------------------------------------------------------------------------------
//
// Create a form for managing input.
//
$form = <<< EOD
<p>
    {$currentWord} ({$guessed})
</p>
<form action='hangman.php' method='get'>
<div>
    <input type='hidden' name='word' value='{$word}' />
    <input type='hidden' name='guessed' value='{$guessed}' />
    <input type='text' name='char' tabindex='1' size='1' maxlength='1' />
    <button type='submit' {$disableButton} tabindex='2' > Make a guess </button>
    <a href='{$_SERVER['PHP_SELF']}'>Restart the game!</a>
</div>
</form>    
<p class="gameOverFont">
    {$gameOverMessage}
</p>
    {$errorMsg}
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

/*
$svgCode = $hangman->DrawPicture();
$svgCode .= $hangman->DrawPartsOfPicture(9);
$svgCode .= $hangman->DrawPartsOfPicture(5);
$svgCode .= $hangman->DrawPartsOfPicture(2);

$svgCode .= $hangman->GetSvgHeader();
$svgCode .= $hangman->DrawHuvud();// a new method for showing head
$svgCode .= "</svg>";
*/

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
$debug = $debugEnable ? $debug : "";

require_once('common.php');//include header and footer

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset={$charset};" />
		<title>{$title}</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	
	   	<div id="wrapper"> 
	   	<div id="main-content">
    		{$header}
    		<div id="left-colHangman">		        
	        	<h1>{$title}</h1>
				<p class = "welcomeMessage">
					Play the classic game "Hangman".<br />
					Guess the word, letter by letter.
				</p>			
				{$form}
					
			</div> <!-- END left-col -->		
			<div id="right-colHangman">{$svgCode}</div>			
			<div class="clear"></div>
			</div> <!-- END main-content -->  
		</div><!-- END wrapper -->  		
    		{$footer}
    		<div class = "debug">{$debug}</div>
	</body>
</html>
EOD;
header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;
?>