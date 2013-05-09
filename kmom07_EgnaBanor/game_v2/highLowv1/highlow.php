<?php
// ===========================================================================================
//
// highlow.php
//
// Description: Program for implementing the card game "High Card Low Card".
// Author: Ralf Eriksson
//
// Load class definitions before calling session_start
session_start();

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
$game = new CHighCardLowCard();


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doGame	= (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {
	case 'init': { 		
		$game->StartGame();

		//$debug .= 'Game initiated.';
		//$debug .= 'Current session id is: ' . session_id() . '<br />';
	}
	break;
	case 'high':
	case 'low':   { // Guess next card is high/low card
		if($game->GuessAndPickCard($doGame) == FALSE) {
			$gameOver = TRUE;
		}

		//$debug .= 'Made a guess. <br />';
	}
	break;		
	
	default: 
	break;
}//end switch


// -------------------------------------------------------------------------------------------
//
// Test the CHighCardLowCard-class
//
//
$htmlGame ="";


if(isset($game)) {

    $htmlGame .= $game->ShowGameStatus();
    
    if($gameOver) {
        $points = $game->GetPoints();
        $game->StartGame();
        $htmlGame .= "<p>Game over. Du lyckades med {$points} kort.</p>";
        
        if($points >= 3) {
            $htmlGame .= "<p>GRATTIS, du har låst upp den hemliga passagen. ";
            $htmlGame .= "<a href='../room.php?id=11'>Gå vidare via den hemliga passagen!</a></p>";
        }
    } else {
        $htmlGame .= <<<EOD
<p>
<a href='highlow.php?game=high'>Nästa kort är högre...</a><br/>
<a href='highlow.php?game=low'>Nästa kort är lägre...</a>
</p>
EOD;
    }
}   



$debug .= 'Current session id is: ' . session_id() . '<br />';

// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
    <div class="header">
        <h1>High & Low</h1>
       
       
    </div>

    <div id="main">
        <div class='gamearea'>
            {$htmlGame}        
        </div> <!-- gamearea -->
        <div id="right_col">
            
            <div class='description'>
            <h3>Beskrivning:</h3>
                <p class='description'>
                    Spela spelet High Low, lyckas gissa rätt på 3 kort för att komma vidare i spelet.
                </p>
            </div> <!-- description -->
               
            <div class='action'>
                <h3>Riktningar:</h3>
                <p class='action'>
                <a href='../room.php?id=9'>Avsluta spelet och gå tillbaka till rummet</a>
                </p>
                <h4>Händelser:</h4>
                <p class='action'>
                <a href='highlow.php?game=init'>Starta ett nytt spel och försök igen</a><br/>
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
require_once('common.php');
$title 		= "Äventyrsspel";
$charset 	= "iso-8859-1";
$language	= "sv";
$debug = $debugEnable ? $debug : "";

$htmlGame = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset={$charset};" />
		<title>{$title}</title>
                
		<link href='../css/main.css' rel='stylesheet' type='text/css' />
	</head>
                
	<body>	
            <div id="wrapper"> 
                <div id="main-content">
                
                    <div id="left-cardGame">                      						
                            {$html}					
                    </div> <!-- END left-col -->
                    <div class="clear"></div>
                </div> <!-- END main-content -->  
            </div><!-- END wrapper -->  		
            <div class = "debug">{$debug}</div>
	</body>
</html>
EOD;


echo $htmlGame;
exit;
?>