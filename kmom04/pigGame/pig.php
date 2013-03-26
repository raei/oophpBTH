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
require_once('CPlayer.php');  //specifik f�r t�rningsspelet
//debugkonfigurering
error_reporting(E_ALL | E_STRICT);
$debug_enabled = TRUE;
$debug = "";

//Hantera formul�rdata f�r spelare ett
$totalScore_P1 = (empty($_POST['totalScore_P1']) ? 0 : $_POST['totalScore_P1']);
$score_this_turn_P1 = (empty($_POST['score_this_turn_P1']) ? 0 : $_POST['score_this_turn_P1']);
$actionP1 = (empty($_POST['actionP1']) ? "pause" : $_POST['actionP1']); //inneh�ller information om vilken knapp spelaren tryckte p�
//Hantera formul�rdata f�r spelare tv�
$totalScore_P2 = (empty($_POST['totalScore_P2']) ? 0 : $_POST['totalScore_P2']);
$score_this_turn_P2 = (empty($_POST['score_this_turn_P2']) ? 0 : $_POST['score_this_turn_P2']);
$actionP2 = (empty($_POST['actionP2']) ? "pause" : $_POST['actionP2']); //inneh�ller information om vilken knapp spelaren tryckte p�

$diceSum = (empty($_POST['diceSum']) ? "pause" : $_POST['diceSum']);

//Variabeldeklarering
$dice_html_P1 = ""; //html-kod f�r att visa den senast slagna t�rningen f�r spelare ett
$dice_html_P2 = ""; //html-kod f�r att visa den senast slagna t�rningen f�r spelare tv�
$form_html_P1 = ""; //formul�r-kod f�r formul�ret f�r spelare ett
$form_html_P2 = ""; //formul�r-kod f�r formul�ret f�r spelare tv�
$html = "";  //slutgiltiga html-koden f�r hemssidan 
$button_visibility_P1 = ""; //anv�nds f�r att g�mma kasta- och stannaknapparna om spelare 1 f�rlorar (sl�r en 1:a)
$button_visibility_P2 = ""; //anv�nds f�r att g�mma kasta- och stannaknapparna om spelare 2 f�rlorar (sl�r en 1:a)
$winnerMess_P1 = ""; //textmedelande till spelare 1 
$winnerMess_P2 = ""; //textmedelande till spelare 2 
$actualScore_P1 = ""; //aktuell po�ng result f�r spelare 1
$actualScore_P2 = ""; //aktuell po�ng result f�r spelare 1
$dice_rolls_P1 = 1; //aktuell t�rnings kast spelare 1
$dice_rolls_P2 = 0; //aktuell t�rnings kast spelare 2
$winnerAnnouncment = ""; // medelande om vems som vann spelet
$winPoints = 100; // hur m�nga po�ng som kr�vs f�r att vinna

//Skapar/�terskapar spelarobjekt och t�rningsobjekt
$player_P1 = new CPlayer($totalScore_P1, $score_this_turn_P1);//skapar spelare 1 med v�rden fr�n form_html_P1
$player_P2 = new CPlayer($totalScore_P2, $score_this_turn_P2);//skapar spelare 1 med v�rden fr�n form_html_P2
$dice_P1 = new CDice(); //skapar t�rning till spelare 1
$dice_P2 = new CDice(); //skapar t�rning till spelare 2
$graphicDice_P1 = new CDiceSvg(); //skapar t�rningsgrafik till spelare 1
$graphicDice_P2 = new CDiceSvg(); //skapar t�rningsgrafik till spelare 2

//Spelare 1 ett kastar t�rningen
if ($actionP1 == 'roll') {
    $dice_rolls_P1 = $dice_P1->diceThrow();
    $dice_rolls_P2 = 0;

    if ($dice_rolls_P1 != 1) {
        //kastar t�rningen
        $player_P1->addRoll($dice_rolls_P1);
        $button_visibility_P2 = 'disabled="disabled"';
        $actualScore_P1 = $player_P1->getTotalScore();
        $player_P1->calcTurn(); //s�tter v�rdena p� spelare 1 variabler
    } else {// Om spelaren sl�r en 1:a s� g�r spelet �ver till spelare 2		
        $button_visibility_P1 = 'disabled="disabled"';
        $winnerMess_P1 = '<p>Ooops! Du slog visst en 1:a </p>';
        $button_visibility_P2 = '';
        $player_P1->getReduceScore();
        $dice_rolls_P1 = 0;
        $dice_rolls_P2 = 1;
    }

    //om spelare 1 uppn�r gr�nsen f�r vinst avslutas spelet och info skrivs ut
    if ($player_P1->getTotalScore() >= $winPoints) {
        $winnerMess_P1 = 'Grattis du vann din totalpo�ngen blev ' . $player_P1->getTotalScore();
        $button_visibility_P1 = 'disabled="disabled"';
        $button_visibility_P2 = 'disabled="disabled"';
        $winnerAnnouncment = "PLAYER ONE WINS THIS ROUND";
    }
}//end if else   

//Spelare 2 kastar t�rningen
if ($actionP2 == 'roll') {
    $dice_rolls_P2 =  $dice_P2->diceThrow();
    $dice_rolls_P1 = 0;

    if ($dice_rolls_P2 != 1) {
        //kastar t�rningen
        $player_P2->addRoll($dice_rolls_P2); //L�gger till po�ngen i den h�r rundan
        $button_visibility_P1 = 'disabled="disabled"';
        $actualScore_P2 = $player_P2->getTotalScore();
        $player_P2->calcTurn(); //s�tter v�rdena p� spelare 2 variabler
    } else {// Men om spelaren sl�r en 1:a g�r spelet �ver till spelare 1			
        $button_visibility_P2 = 'disabled="disabled"';
        $winnerMess_P2 = '<p>Ooops! Du slog visst en 1:a </p>';
        $button_visibility_P1 = '';
        $player_P2->getReduceScore();
        $dice_rolls_P2 = 0;
        $dice_rolls_P1 = 1;
    }

    //om spelare 2 uppn�r gr�nsen f�r vinst avslutas spelet och info skrivs ut
    if ($player_P2->getTotalScore() >= $winPoints) {
        $winnerMess_P2 = 'Grattis du vann din totalpo�ngen blev ' . $player_P2->getTotalScore();
        $button_visibility_P1 = 'disabled="disabled"';
        $button_visibility_P2 = 'disabled="disabled"';
        $winnerAnnouncment = "PLAYER TWO WINS THIS ROUND";
    }
}

//Spelare 1 v�ljer att stanna
if ($actionP1 == 'stay') {
    $actualScore_P1 = $player_P1->getTotalScore();
    $button_visibility_P1 = 'disabled="disabled"';
    $dice_rolls_P1 = 0;
    $dice_rolls_P2 = 1;
}

//Spelare 2 v�ljer att stanna
if ($actionP2 == 'stay') {
    $actualScore_P2 = $player_P2->getTotalScore();
    $button_visibility_P2 = 'disabled="disabled"';
    $dice_rolls_P2 = 0;
    $dice_rolls_P1 = 1;
}

//Grafisk presentation av t�rningskastet f�r spelare ett
$dice_html_P1 = $graphicDice_P1->GetSvg($dice_rolls_P1);

//Grafisk presentation av t�rningskastet f�r spelare tv�
$dice_html_P2 = $graphicDice_P2->GetSvg($dice_rolls_P2);

// Formul�r spelare 1
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

//Formul�r spelare 2
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
                <div class="dice">{$dice_html_P1}</div> <!-- Skriv ut t�rningen -->   
                <h3>{$player_P1->getTotalScore()}</h3>
            </div><!-- end playerOne--> 
                
                 <div class="restart">  
                <a href='{$_SERVER['PHP_SELF']}'>PLAY</a>
             </div>
                
            <div id="playerTwo">
                <h2>PLAYER TWO</h2>            
                <div class="form">{$form_html_P2} </div>              
                <div class="dice">{$dice_html_P2} </div> <!-- Skriv ut t�rningen -->      
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
