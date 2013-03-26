<?php
// ===========================================================================================
//
// hand.php
//
// Description: My testprogram for my class implementing a hand of cards.
// Used to show off that it works as expected.
//
//
// Author: Mikael Roos
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


// -------------------------------------------------------------------------------------------
//
// Create and test the classes
//
//
require_once('CDeck.php');
require_once('CCardHand.php');
$deck = new CDeck();
$hand1 = new CCardHand();
$hand2 = new CCardHand();

$deck->InitAndShuffle();

$html .= "<h2>Plocka en hand med 5 kort.</h2>";
for($i=0; $i<5; $i++) {
	$card = $deck->DealFromTop();
	$card->FlipCard();
	$hand1->AddCard($card);
}
$html .= $hand1->GetCardsAsBox();

$html .= "<h2>Gör en ny hand och plocka 5 kort.</h2>";
for($i=0; $i<5; $i++) {
	$card = $deck->DealFromTop();
	$card->FlipCard();
	$hand2->AddCard($card);
}
$html .= $hand2->GetCardsAsBox();


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('common.php');
$title 		= "Att hantera en korthand";
$charset 	= "iso-8859-1";
$language	= "sv";

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