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




if(isset($_SESSION['game'])) {
        $htmlGame .= "<p>Gissa om nästa kort är högre eller lägre.</p>";
	$htmlGame .= $_SESSION['game']->ShowGameStatus();
	
	if($gameOver) {
		$points = $_SESSION['game']->GetPoints();
		$_SESSION['game']->StartGame();
		$htmlGame .= "<p> Game over. Du klarade {$points} kort.</p>";
                
                 if($points >= 3) {
                    $htmlGame .= "<p style='color:white; font-size:20px;'>GRATTIS, du har nu fått nyckeln till båten. </p>";
                    $htmlGame .= "<p><a  style='color:white; font-size:18px;' href='../room.php?id=11'>Gå till hamen och lås upp din båt och segla hemmåt!</a></p>";
                }
                
                
        } else {
		$htmlGame .= <<<EOD
                    <p>
                    <table>    
                        <tr>
                            <td id="low"><a href='highlow.php?game=low'>LÄGRE</a></td>
                            <td id="streck">&#124;</td>
                            <td id="high"><a href='highlow.php?game=high'>HÖGRE</a></td>
                        </tr>
                     </table>                   
                    </p>
EOD;
	}
}	

$htmlGame .= <<<EOD
<div class='description'>
<h4>Beskrivning:</h4>
<p class='description'>
Lyckas gissa rätt på 3 kort och du får nyckeln till båten.
</p>
</div> <!-- description -->

<div class='action'>
<h4>Riktningar:</h4>
<p class='action'>
<a href='../room.php?id=9'>Avsluta gå tillbaka till rummet</a>
</p>
<h4>Händelser:</h4>
<p class='action'>
<a href='highlow.php?game=init'>Spela igen</a><br/>
</p>
</div> <!-- actions -->
EOD;

$debug .= 'Current session id is: ' . session_id() . '<br />';


$title = "Spela kortspelet High Card Low Card";

$html = <<<EOD
          <div id="wrapper"> 
                <div id="main-content">
                  
                    <div id="left-cardGame">
                           <h1>{$title}</h1>							
                            {$htmlGame}					
                    </div> <!-- END left-col -->
                    <div class="clear"></div>
                </div> <!-- END main-content -->  
            </div><!-- END wrapper -->  		
            
          
        
EOD;

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('common.php');

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
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>	
          {$html}
            <div class = "debug">{$debug}</div>
	</body>
</html>
EOD;

header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;
?>