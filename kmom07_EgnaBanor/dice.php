<?php

// ===========================================================================================
//
// dice.php
//
// Description: Kasta lite tärning
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
// Take care of GET variables, and validate them
//
//$antal    = (empty($_GET['antal'])    ? "" : $_GET['antal']);
$antal = filter_input(INPUT_GET, 'antal', FILTER_VALIDATE_INT);
if($antal === FALSE) die("Felaktigt värde."); 

// This will evaluate to TRUE so the text will be printed.
if (isset($var)) {
    echo "This var is set so I will print.";
}

// -------------------------------------------------------------------------------------------
// 
// Create a form for managing input.
//
$form = <<< EOD
<div>
    <form action='{$_SERVER['PHP_SELF']}' method='get'>
    <input type='text' name='antal' value='{$antal}' />
        <button type='submit'>Kasta</button>
    </form>
    <p>
    <a href='{$_SERVER['PHP_SELF']}'>Starta om</a>
    </p>
</div>

EOD;

// -------------------------------------------------------------------------------------------
//
// Throw a dice, return the value.
//
require_once("CDiceSvg.php");
require_once("CHistogram.php");

$histogram = new CHistogram();
$dice = new CDiceSvg();

$diceHtml = "<p>";

if($antal) {

    $dice->RollRepeatedly($antal);
    //$slag = $dice->iLastThrows;
    $slag = $dice->GetLastThrows();
    
    $serie    = $histogram->ShowValues($slag);
    $medel    = round($histogram->Average($slag), 1);
    $graf     = $histogram->PrintGraf($slag);
    
    // Show all dices as Svg
    foreach($slag as $key => $value) {
        $diceHtml .= $dice->GetSvg($value);
    }
    
    $diceHtml .= <<<EOD
<br />
   Slagserien är: <br />
{$serie}

<br />
Medelvärdet av slagserien är: {$medel}
<br />

En graf över histogrammet:
<br />
{$graf}

EOD;
} else {

    $diceHtml .= "<a href='http://en.wikipedia.org/wiki/Alea_iacta_est'>Alea iacta est...</a>";
}

$diceHtml .= "</p>";


// -------------------------------------------------------------------------------------------
//
// The content of the page
//

$html = <<<EOD
<div id="main-content">   
    <div id="left-col">	
             
        <h1>Min Tärning</h1>
        <p> Välkommen att kasta lite tärning, ange hur många kast du vill göra.</p>
            {$form}        
            {$diceHtml}

        </div><!-- END left-col -->    
             <div class="clear"></div>
</div> <!-- END main-content -->  
   
EOD;

//--------------------
// Skapa och skriv ut sidan

require_once('common.php');
$title = "Ralf E Tärning";
$charset = "iso-8859-1";
$language = "sv";
$debug         = $debugEnable ? $debug : "";

$html = <<<EOD
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset={$charset}" />       
        <title>{$title}</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    	<body>
    		<div id="wrapper"> 
    			{$header}	    		      
	        	{$html}                        
	        </div><!-- END wrapper -->       
    			{$footer}
                <div style='font-size: small;'>
                    {$debug}
                 </div>
    	</body>
</html>
EOD;

echo $html;
exit;
?>