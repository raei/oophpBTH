<?php

// ===========================================================================================
//
// pig.php
//
// Description: Play the classic pig game.
//
// Author: Ralf Eriksson
//


//externa php-filer
require_once('CDice.php');
require_once('CDiceSvg.php');
require_once('CPlayer.php');  //specifik för tärningsspelet
//debugkonfigurering
error_reporting(E_ALL | E_STRICT);
$debug_enabled = TRUE;
$debug = "";

//Hantera formulärdata för spelare ett
$totalScore_P1 = (empty($_POST['totalScore_P1']) ? 0 : $_POST['totalScore_P1']);
$score_this_turn_P1 = (empty($_POST['score_this_turn_P1']) ? 0 : $_POST['score_this_turn_P1']);
$actionP1 = (empty($_POST['actionP1']) ? "pause" : $_POST['actionP1']); //innehåller information om vilken knapp spelaren tryckte på
//Hantera formulärdata för spelare två
$totalScore_P2 = (empty($_POST['totalScore_P2']) ? 0 : $_POST['totalScore_P2']);
$score_this_turn_P2 = (empty($_POST['score_this_turn_P2']) ? 0 : $_POST['score_this_turn_P2']);
$actionP2 = (empty($_POST['actionP2']) ? "pause" : $_POST['actionP2']); //innehåller information om vilken knapp spelaren tryckte på

$diceSum = (empty($_POST['diceSum']) ? "pause" : $_POST['diceSum']);

//Variabeldeklarering
$dice_html_P1 = ""; //html-kod för att visa den senast slagna tärningen för spelare ett
$dice_html_P2 = ""; //html-kod för att visa den senast slagna tärningen för spelare två
$form_html_P1 = ""; //formulär-kod för formuläret för spelare ett
$form_html_P2 = ""; //formulär-kod för formuläret för spelare två
$html = "";  //slutgiltiga html-koden för hemssidan 
$button_visibility_P1 = ""; //används för att gömma kasta- och stannaknapparna om spelare 1 förlorar (slår en 1:a)
$button_visibility_P2 = ""; //används för att gömma kasta- och stannaknapparna om spelare 2 förlorar (slår en 1:a)
$winnerMess_P1 = ""; //textmedelande till spelare 1 
$winnerMess_P2 = ""; //textmedelande till spelare 2 
$actualScore_P1 = ""; //aktuell poäng result för spelare 1
$actualScore_P2 = ""; //aktuell poäng result för spelare 1
$dice_rolls_P1 = 1; //aktuell tärnings kast spelare 1
$dice_rolls_P2 = 0; //aktuell tärnings kast spelare 2
$winnerAnnouncment = ""; // medelande om vems som vann spelet
$winPoints = 100; // hur många poäng som krävs för att vinna

//Skapar/återskapar spelarobjekt och tärningsobjekt
$player_P1 = new CPlayer($totalScore_P1, $score_this_turn_P1);//skapar spelare 1 med värden från form_html_P1
$player_P2 = new CPlayer($totalScore_P2, $score_this_turn_P2);//skapar spelare 1 med värden från form_html_P2
$dice_P1 = new CDice(); //skapar tärning till spelare 1
$dice_P2 = new CDice(); //skapar tärning till spelare 2
$graphicDice_P1 = new CDiceSvg(); //skapar tärningsgrafik till spelare 1
$graphicDice_P2 = new CDiceSvg(); //skapar tärningsgrafik till spelare 2

//Spelare 1 ett kastar tärningen
if ($actionP1 == 'roll') {
    $dice_rolls_P1 = $dice_P1->diceThrow();
    $dice_rolls_P2 = 0;

    if ($dice_rolls_P1 != 1) {
        //kastar tärningen
        $player_P1->addRoll($dice_rolls_P1);
        $button_visibility_P2 = 'disabled="disabled"';
        $actualScore_P1 = $player_P1->getTotalScore();
        $player_P1->calcTurn(); //sätter värdena på spelare 1 variabler
    } else {// Om spelaren slår en 1:a så går spelet över till spelare 2		
        $button_visibility_P1 = 'disabled="disabled"';
        $winnerMess_P1 = '<p>Ooops! Du slog visst en 1:a </p>';
        $button_visibility_P2 = '';
        $player_P1->getReduceScore();
        $dice_rolls_P1 = 0;
        $dice_rolls_P2 = 1;
    }

    //om spelare 1 uppnår gränsen för vinst avslutas spelet och info skrivs ut
    if ($player_P1->getTotalScore() >= $winPoints) {
        $winnerMess_P1 = 'Grattis du vann din totalpoängen blev ' . $player_P1->getTotalScore();
        $button_visibility_P1 = 'disabled="disabled"';
        $button_visibility_P2 = 'disabled="disabled"';
        $winnerAnnouncment = "PLAYER ONE WINS THIS ROUND";
    }
}//end if else   

//Spelare 2 kastar tärningen
if ($actionP2 == 'roll') {
    $dice_rolls_P2 =  $dice_P2->diceThrow();
    $dice_rolls_P1 = 0;

    if ($dice_rolls_P2 != 1) {
        //kastar tärningen
        $player_P2->addRoll($dice_rolls_P2); //Lägger till poängen i den här rundan
        $button_visibility_P1 = 'disabled="disabled"';
        $actualScore_P2 = $player_P2->getTotalScore();
        $player_P2->calcTurn(); //sätter värdena på spelare 2 variabler
    } else {// Men om spelaren slår en 1:a går spelet över till spelare 1			
        $button_visibility_P2 = 'disabled="disabled"';
        $winnerMess_P2 = '<p>Ooops! Du slog visst en 1:a </p>';
        $button_visibility_P1 = '';
        $player_P2->getReduceScore();
        $dice_rolls_P2 = 0;
        $dice_rolls_P1 = 1;
    }

    //om spelare 2 uppnår gränsen för vinst avslutas spelet och info skrivs ut
    if ($player_P2->getTotalScore() >= $winPoints) {
        $winnerMess_P2 = 'Grattis du vann din totalpoängen blev ' . $player_P2->getTotalScore();
        $button_visibility_P1 = 'disabled="disabled"';
        $button_visibility_P2 = 'disabled="disabled"';
        $winnerAnnouncment = "PLAYER TWO WINS THIS ROUND";
    }
}

//Spelare 1 väljer att stanna
if ($actionP1 == 'stay') {
    $actualScore_P1 = $player_P1->getTotalScore();
    $button_visibility_P1 = 'disabled="disabled"';
    $dice_rolls_P1 = 0;
    $dice_rolls_P2 = 1;
}

//Spelare 2 väljer att stanna
if ($actionP2 == 'stay') {
    $actualScore_P2 = $player_P2->getTotalScore();
    $button_visibility_P2 = 'disabled="disabled"';
    $dice_rolls_P2 = 0;
    $dice_rolls_P1 = 1;
}

//Grafisk presentation av tärningskastet för spelare ett
$dice_html_P1 = $graphicDice_P1->GetSvg($dice_rolls_P1);

//Grafisk presentation av tärningskastet för spelare två
$dice_html_P2 = $graphicDice_P2->GetSvg($dice_rolls_P2);

// Formulär spelare 1
$form_html_P1 = <<< EOD
    <p>	
        <form method="post">
            <button class="submitBtnDesign"  type="submit" name="actionP1" value="roll" {$button_visibility_P1}>ROLL</button>
            <button class="submitBtnDesign"  type="submit" name="actionP1" value="stay" {$button_visibility_P1}>STAY</button>
            <input type='hidden'  name="totalScore_P1" value="{$player_P1->getTotalScore()}" />
            <input type='hidden' name="totalScore_P2" value="{$player_P2->getTotalScore()}" />                   
            <input type='hidden' name="score_this_turn_P1" value="{$player_P1->getDicsScore()}" />
        </form>
    </p>
EOD;

//Formulär spelare 2
$form_html_P2 = <<< EOD
<p>	
    <form method="post">        
        <button class="submitBtnDesign" type="submit" name="actionP2" value="roll" {$button_visibility_P2}>ROLL</button>
        <button class="submitBtnDesign" type="submit" name="actionP2" value="stay" {$button_visibility_P2}>STAY</button>
        <input 	type='hidden' name="totalScore_P2" value="{$player_P2->getTotalScore()}" />
        <input 	type='hidden' name="totalScore_P1" value="{$player_P1->getTotalScore()}" />
        <input 	type='hidden' name="score_this_turn_P2" value="{$player_P2->getDicsScore()}" />                
    </form>
</p>
EOD;


// Html-sidan
<<<<<<< HEAD
$html = <<< EOD
<!doctype HTML>
<html lang="sv">
<head>
	<title>PIG DICE RALF</title>
         <link href="style.css" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<meta charset="iso-8859-1">
        <meta name="viewport" content="width=device-width">
            
=======

$html = <<< EOD
<!doctype HTML>
<html lang="sv">
<head>
	<title>PIG DICE RALF</title>
         <link href="style.css" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<meta charset="iso-8859-1">        
>>>>>>> branch 'master' of https://github.com/raei/oophp.git
</head>
<body>
        <div id="main">
        <p class="rules">
                    <a rel="rules" href="./example/gameRules.jpg">GAME RULES</a>        
                </p>
            <h1>PIG GAME</h1>      
            <div id="playerOne">
                <h2>PLAYER ONE</h2>        
                <div class="form">{$form_html_P1}</div>            
                <div class="dice">{$dice_html_P1}</div> <!-- Skriv ut tärningen -->   
                <h3>{$player_P1->getTotalScore()}</h3>
            </div><!-- end playerOne--> 
                
                 <div class="restart">  
                <a href='{$_SERVER['PHP_SELF']}'>PLAY</a>
             </div>
                
            <div id="playerTwo">
                <h2>PLAYER TWO</h2>            
                <div class="form">{$form_html_P2} </div>              
                <div class="dice">{$dice_html_P2} </div> <!-- Skriv ut tärningen -->      
                <h3>{$player_P2->getTotalScore()}</h3>
            </div><!-- end playerTwo-->
           
            <div style='font-size:24px; color:white; clear:both; margin-left: 20px; margin-top:10px;'>
                {$debug}
                {$winnerAnnouncment}
            </div> 
                
        </div><!-- end main-->	
                
        <script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>	
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>	
 
	<script type="text/javascript">
		$(document).ready(function() {		
			$("a[rel=rules]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span </span>';
				}
			});
		});
	</script>
</body>
</html>
EOD;

echo $html; //skriver ut sidan
exit;
?>
