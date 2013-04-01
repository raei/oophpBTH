<?php
// ===========================================================================================
//
// session.php
//
// Description: My testprogram for sessions.
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
require_once('CCardHand.php');
require_once('CDeck.php');

// Load class definitions before calling session_start
session_start();


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doSession	= (empty($_GET['session']) ? FALSE : $_GET['session']);

switch($doSession) {
	case 'init': { // Destroy and then initiate the session
		require('ISessionDestroy.php');
		//
		// Initiating a session and storing an object in the session variable
		//		
		//
		session_start();          // Must call again if we destroyed just destroyed
 			                  // the session.
		session_regenerate_id();  // To avoid problems

		$_SESSION['hand']   = new CCardHand();
		$_SESSION['deck']   = new CDeck();
		$_SESSION['rounds'] = 0;

		$debug .= 'Session destroyed and created.';
		$debug .= 'Current session id is: ' . session_id() . '<br />';
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
// Using the session variable
//
if(isset($_SESSION['deck'])) {
	$card = $_SESSION['deck']->DealFromTop();
	
	// Only if there is more cards to retrieve
	if($card) {
		$card->FlipCard();
		$_SESSION['hand']->AddCard($card);
		$_SESSION['rounds'] += 1;
	} else {
		$html .= "<h1><em>The deck is empty.</em></h1>";
	}
	
	$html .= "<h1>Leker med sessioner</h1>";
	$html .= $_SESSION['hand']->GetCardsAsBox();
	$html .= <<<EOD
<p>
Antalet rundor äro {$_SESSION['rounds']}.
<a href='session.php'>Ny runda</a>
</p>
EOD;
}

$html .= <<<EOD
<p>
<a href='session.php?session=init'>Initiera ny session (och förstör den befintliga)</a><br/>
<a href='session.php?session=destroy'>Förstör sessionen</a>
</p>
EOD;

$debug .= 'Current session id is: ' . session_id() . '<br />';


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('common.php');
$title 		= "Testa sessioner";
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