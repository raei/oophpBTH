<?php

// ===========================================================================================
//
// pig.php
//
// Description: Play the classic pig game.
//
// Author: Ralf Eriksson
//

//ladda externa php-filer
require_once('CDice.php');
require_once('CDiceSvg.php');
require_once('CPlayer.php');  //specifik för tärningsspelet
//debugkonfigurering
error_reporting(E_ALL | E_STRICT);
$debugEnable = TRUE;
$debug = "";

//Hantera formulärdata för spelare ett
$totalScore_P1 = (empty($_POST['totalScore_P1']) ? 0 : $_POST['totalScore_P1']);
$score_this_turn_P1 = (empty($_POST['score_this_turn_P1']) ? 0 : $_POST['score_this_turn_P1']);
$actionP1 = (empty($_POST['actionP1']) ? "pause" : $_POST['actionP1']); //innehåller information om vilken knapp spelaren tryckte på

$diceSum = (empty($_POST['diceSum']) ? "pause" : $_POST['diceSum']);



//Variabeldeklarering
$dice_html_P1 = ""; //html-kod för att visa den senast slagna tärningen för spelare ett
$form_html_P1 = ""; //formulär-kod för formuläret för spelare ett
$html = "";  //slutgiltiga html-koden för hemssidan 
$button_visibility_P1 = FALSE; //används för att gömma kasta- och stannaknapparna om spelare 1 förlorar (slår en 1:a)
$winnerMess_P1 = ""; //textmedelande till spelare 1 
$actualScore_P1 = ""; //aktuell poäng result för spelare 1
$dice_rolls_P1 = 7; //aktuell tärnings kast spelare 1
$winnerAnnouncment = ""; // medelande om du vann spelet
$winPoints = 10; // hur många poäng som krävs för att vinna
$goback = "";//var för att kunna styra om du ska kunna gå tillbaka 
$restart = ""; //för att kunna starta om spelet

//Skapar/återskapar spelarobjekt och tärningsobjekt
$player_P1 = new CPlayer($totalScore_P1, $score_this_turn_P1);//skapar spelare 1 med värden från form_html_P1
$dice_P1 = new CDice(); //skapar tärning till spelare 1
$graphicDice_P1 = new CDiceSvg(); //skapar tärningsgrafik till spelare 1

//Spelareen kastar tärningen
if ($actionP1 == 'Kasta') {
    $dice_rolls_P1 = $dice_P1->diceThrow();   
 
    if ($dice_rolls_P1 != 1) {
        //kastar tärningen
        $player_P1->addRoll($dice_rolls_P1);       
        $actualScore_P1 = $player_P1->getTotalScore();     
        $player_P1->calcTurn(); //sätter värdena på spelare 1 variabler
    } else {// Om spelaren slår en 1:a        
        $winnerMess_P1 = '<p>Ooops! Du slog visst en 1:a starta om. </p>';      
        $player_P1->getReduceScore();
        $button_visibility_P1 = TRUE;//Disable submit button
        $restart = "<a href='{$_SERVER['PHP_SELF']}'>Starta om!</a>";
    }

    //om spelare 1 uppnår gränsen för vinst avslutas spelet och info skrivs ut
    if ($player_P1->getTotalScore() >= $winPoints) {             
        $winnerAnnouncment = "GRATTIS DU KLARADE UTMANINGEN";
        $button_visibility_P1 = TRUE;//Disable submit button
        $goback = " <a href='../room.php?id=8'>Avsluta gå till hemliga staden</a>";
    }
}//end if else   

//Grafisk presentation av tärningskastet för spelare ett
$dice_html_P1 = $graphicDice_P1->GetSvg($dice_rolls_P1);

// Formulär spelare
$form_html_P1 = <<< EOD
    
        <form method="post">
            <p class="submit">        	
                <input type="submit" name="actionP1" value="Kasta"  text= "Kasta" id="sub" />  
            </p>
            <input type='hidden'  name="totalScore_P1" value="{$player_P1->getTotalScore()}" />                            
            <input type='hidden' name="score_this_turn_P1" value="{$player_P1->getDicsScore()}" />
        </form>    
EOD;
        
// Dice-delen
$htmlDice = <<<EOD
        
 <div class='gameareaDice'>
            <div id="playerOne">                                           
                 <div class="dice">{$dice_html_P1}</div> <!-- Skriv ut tärningen -->                         
            </div><!-- end playerOne-->   
                    <div id="diceScore"> 
                    <h3>{$player_P1->getTotalScore()}</h3>
                    </div><!-- end diceScore -->        
              <div id='kid'></div>
                     <div class="form">{$form_html_P1}</div>  
            <div style='font-size:20px; color:white; clear:both; margin-left: 70px;'>                
                {$winnerAnnouncment}
                {$winnerMess_P1}
            </div>            
</div><!-- end gameareaDice -->      
EOD;

//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
    <div class="header">
        <h1>Spela tärning</h1>       
    </div>
    <div id="main">              
        {$htmlDice}        
        <div id="right_col">
            <div class='helthmeter'>
              <h3>Hälsa</h3>  
             <p class='action'>                
            </p>
        </div>
            <div class='description'>
            <h3>Beskrivning</h3>
           <p class='description'>
		Kasta 10 poäng annars är du fast här.
            </p>
            </div> <!-- description -->
                <div class='action'>
                    <h3>Vägval</h3>
                    <p class='action'>
                        {$goback}                       
                    </p>
                </div> <!-- actions -->                       
                <div class='actionEvents'>
                    <h3>Händelser</h3>    
                    <p class='action'>
                        {$restart}                       
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
$charset 	= "iso-8859-1";
$language	= "sv";
$title		= "Tärning";
$debug 		= $debugEnable ? $debug : "";

$html = <<<EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset={$charset};" />
		<title>{$title}</title>
		<link href="../css/main.css" rel="stylesheet" type="text/css" />  
                <link href="styleDice.css" rel="stylesheet" type="text/css" />                                    
                <script>
                    window.onload = init;
                    function init() {
                        if (!document.getElementById) return;
                        var submitObj = document.getElementById('sub');
                        submitObj.disabled = {$button_visibility_P1};
                    }
                </script>                
	</head>
	<body>	
          {$html}
            <div class = "debug">{$debug}</div>          
	</body>
</html>
EOD;
//header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;
?>