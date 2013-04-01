<?php
// ===========================================================================================
//
// deck.php
//
// Description: My testprogram for my class deckofcards. Used to show off that it 
// works as expected.
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


// -------------------------------------------------------------------------------------------
//
// Create and test the CDeck-class
//
//
require_once('CDeck.php');
$deck1 = new CDeck();

$html .= "<h1>Hur ser min kortlek ut?</h1>";

$html .= "<h2>Visa kort i en oblandad lek</h2><p><div style='float: left; background: green;'>";
while($card = $deck1->DealFromTop()) {
	$card->FlipCard();
	$html .= $card->GetCardAsBox();
}
// divClear used to clearing the float-left state in css.
$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
$html .= "</div>{$divClear}</p>";

$html .= "<h2>Initiera och blanda leken, plocka 5 kort.</h2><p><div style='float: left; background: green;'>";
$deck1->InitAndShuffle();
for($i=0; $i<5; $i++) {
	$card = $deck1->DealFromTop();
	$card->FlipCard();
	$html .= $card->GetCardAsBox();
}
// divClear used to clearing the float-left state in css.
$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
$html .= "</div>{$divClear}</p>";


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('common.php');
$title 		= "Testar min kortlek";
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