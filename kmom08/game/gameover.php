<?php
// ===========================================================================================
//
// gameover.php
//
// Description: Show a gameover message.
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
$debugEnable = FALSE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$reason    = (empty($_GET['reason']) ? "Ingen anledning presenterad." : $_GET['reason']);


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
<h1>Äventyrsspel</h1>
<h2>GAME OVER</h2>
<p>
Anledning: {$reason}
</p>
<p>
<a href="adventure.php">Gå till startsidan</a> 
</p>
</div> <!-- wrapper -->

EOD;


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//

$title         = "Game Over";
$charset     = "iso-8859-1";
$language    = "sv";
$stylesheet = "";
$debug = $debugEnable ? $debug : "";

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
        <meta http-equiv="Content-Type" content="text/html; {$charset};" />
        <title>{$title}</title>
        <style type="text/css">{$stylesheet}</style>
        <link rel='stylesheet' href='css/start.css' type='text/css' media='screen' />
    </head>
    <body>  
        <div id="wrapper">
        {$html}       
        </div>
    </body>
</html>
EOD;
header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;
?>