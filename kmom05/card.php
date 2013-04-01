<?php

    // -------------------------------------------------------------------------------------------
    //
    // Error handling on/off
    //
    error_reporting(E_ALL | E_STRICT);
    $debug = "";
   // $debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information


    // -------------------------------------------------------------------------------------------
    //
    // Prepare the page content
    //
    $html = "";

    //
    // Create and test the CCard-class
    //
    // Showing foreach-loop  
    //
    require_once('CCard.php');
    $c1 = new CCard('H', 1, 1);
    $c2 = new CCard('S', 13, 0);
    $c3 = new CCard('S', 12, 1);
    $c4 = new CCard('C', 6, 1);
    $c5 = new CCard('D', 9, 1);
    $c6 = new CCard('X', 2, 1);

    $hand = Array($c1, $c2, $c3, $c4, $c5, $c6);

    $html .= "<h1>Vilka kort har jag nu?</h1>";


    // Show as id
    $html .= "<h2>Som id</h2><p>";
    foreach($hand as $card) {
            $html .= $card->GetCardAsId() . ", ";
    }
    $html .= "</p>";


    // Show as text
    $html .= "<h2>Som text</h2><p>";
    foreach($hand as $card) {
            $html .= $card->GetCardAsText() . ", ";
    }
    $html .= "</p>";


    // Show as box
    $html .= "<h2>Som box</h2><p><div style='float: left; background: black;'>";
    foreach($hand as $card) {
            $html .= $card->GetCardAsBox();
    }
    // divClear used to clearing the float-left state in css.
    $divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
    $html .= "</div>{$divClear}</p>";


    // Flip all and show as box
    $html .= "<h2>Vänd korten och visa som box</h2><p><div style='float: left; background: black;'>";
    foreach($hand as $card) {
            $card->FlipCard();
            $html .= $card->GetCardAsBox();
    }
    // divClear used to clearing the float-left state in css.
    $divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
    $html .= "</div>{$divClear}</p>";
    
    // -------------------------------------------------------------------------------------------
//
// Create and print out the html-page//
$charset 	= "iso-8859-1";
$language	= "sv";
$title		= "Card Game";

require_once('common.php');//include header and footer

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
