<?php

// ===========================================================================================
//
// highlow.php
//
// Description: Program for implementing the card game "High Card Low Card".
// Author: Ralf Eriksson
//

// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = FALSE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Prepare the page content
//
$html = "";

// Include class definitions
require_once('CHighCardLowCard.php');

// Calling session_start
session_start();

// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doGame    = (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {
	case 'init': { 
		$_SESSION['game'] = new CHighCardLowCard();
		$_SESSION['game']->StartGame();

		$debug .= 'Game initiated.';
		$debug .= 'Current session id is: ' . session_id() . '<br />';
	}
	break;
	case 'high':
	case 'low':   { // Guess next card is high/low card
		if($_SESSION['game']->GuessAndPickCard($doGame) == FALSE) {
			$gameOver = TRUE;
		}

		$debug .= 'Made a guess. <br />';
	}
	break;	
	
	default: 
	break;
}

$htmlGame = "";
$event = "";

if(isset($_SESSION['game'])) {
      
	$htmlGame .= $_SESSION['game']->ShowGameStatus();
	
	if($gameOver) {
		$points = $_SESSION['game']->GetPoints();
		$_SESSION['game']->StartGame();
		$htmlGame .= "<p style='font-size: 12px; padding-left: 5px;color:orange;'>Du klarade {$points} kort.</p>";
                
                 if($points >= 3) {
                    $htmlGame .= "<p style='color:white; font-size:15px;padding-left: 5px; color:orange;'>GRATTIS, du har nu f�tt nyckeln till b�ten. </p>";                   
   
                    $event = " <p>
                                    <a href='../room.php?id=11'>
                                        G� till hamnen och l�s upp din b�t<br> och segla hemm�t!
                                    </a>
                                </p>";
                }          


                
                
                
        } else {
		$htmlGame .= <<<EOD
                    <p>
                    <table>    
                        <tr>
                            <td id="low"><a href='highlow.php?game=low'>L�GRE</a></td>
                            <td id="streck">&#124;</td>
                            <td id="high"><a href='highlow.php?game=high'>H�GRE</a></td>
                        </tr>
                     </table>                   
                    </p>
EOD;

/*
                    $event = "<a href='highlow.php?game=init'>Spela igen</a><br/>"

*/
	}
}	



//
// The content of the page
//

$html = <<<EOD

<div class='wrapper'>
    <div class="header">
        <h1>�ventyrsspel</h1>
        <h2>Spela kort</h2>
       
    </div>

    <div id="main">
        <div class='gamearea'>
       {$htmlGame}
        
        </div> <!-- gamearea -->
        <div id="right_col">
            <div class='helthmeter'>
              <h3>H�lsa</h3>  
             <p class='action'>
               
            </p>
            </div>
            <div class='description'>
            <h3>Beskrivning</h3>
           <p class='description'>
				Lyckas gissa r�tt p� 3 kort och du f�r nyckeln till b�ten.
                Du f�r en chans att vinna.
			</p>
            </div> <!-- description -->
                <div class='action'>
                    <h3>V�gval</h3>
                <p class='action'>
					<a href='../room.php?id=9'>Avsluta g� till spelstigen</a>
				</p>
                </div> <!-- actions -->                       
                <div class='actionEvents'>
                    <h3>H�ndelser</h3>    
                    <p class='action'>
						{$event}
					</p>                         
                </div> <!-- actions --> 
        </div> <!-- end right_col-->
    </div> <!-- main -->    
</div> <!-- wrapper -->

EOD;


// ---------------------------------------------------------------------------------------
//
// Create and print out the html-page
//

$title = "Spela High Card Low Card";
$charset 	= "iso-8859-1";
$language	= "sv";
$debug = $debugEnable ? $debug : "";

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset={$charset};" />
		<title>{$title}</title>
		<link href="../css/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>	
          {$html}
            <div class = "debug">{$debug}</div>
	</body>
</html>
EOD;


echo $html;
exit;
?>