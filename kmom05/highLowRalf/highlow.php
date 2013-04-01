<?php
// ===========================================================================================
//
// highlow.php
//
// Description: My testprogram for my class implementing the card game "High Card Low Card".
// Used to show off that it works as expected.
//
//
// Author: Ralf Eriksson
//


// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Prepare the page content
//
$html = "";

// Include class definitions
require_once('CHighCardLowCard.php');

// Load class definitions before calling session_start
session_start();


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doGame	= (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {
	case 'init': { // Destroy and then initiate the session
		require('ISessionDestroy.php');
		//
		// Initiating a session and storing an object in the session variable		
		//
		session_start();          // Must call again if we just destroyed
 			                        // the session.
		session_regenerate_id();  // To avoid problems

		$_SESSION['game']   = new CHighCardLowCard();
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
	
	case 'destroy': { // Only destroy the session
		require('ISessionDestroy.php');
		$debug .= 'Session destroyed.';
		$debug .= 'Current session id is: ' . session_id() . '<br />';
	}
	break;
	
	default: 
	break;
}


// -------------------------------------------------------------------------------------------
//
// Test the CHighCardLowCard-class
//
//

$html .= "<p>Gissa om nästa kort är högre eller lägre.</p>";

if(isset($_SESSION['game'])) {

	$html .= $_SESSION['game']->ShowGameStatus();
	
	if($gameOver) {
		$points = $_SESSION['game']->GetPoints();
		$_SESSION['game']->StartGame();
		$html .= <<<EOD
<p>
Game over. Du lyckades med {$points} kort.
</p>
EOD;
	} else {
		$html .= <<<EOD
<p>
<a href='highlow.php?game=high'>Nästa kort är högre...</a><br/>
<a href='highlow.php?game=low'>Nästa kort är lägre...</a>
</p>
EOD;
	}
}	

$html .= <<<EOD
<p>
<a href='highlow.php?game=init'>Starta ett nytt spel</a><br/>
<a href='highlow.php?game=destroy'>Avbryt spelet</a>
</p>
EOD;

$debug .= 'Current session id is: ' . session_id() . '<br />';


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('common.php');
$title 		= "Spela kortspelet High Card Low Card";
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
            <div id="wrapper"> 
                <div id="main-content">
                    {$header}
                    <div id="left-colHangman">
                           <h1>{$title}</h1>							
                            {$html}					
                    </div> <!-- END left-col -->
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