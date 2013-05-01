 <?php
// ===========================================================================================
//
// adventure.php
//
// Description: Start and overview of the adventure game.
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
// Take care of GET variables
//
$doGame    = (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {

    case 'start':   {                         // Go to the first room

        //
        // Make a redirect to the first room
        // http://php.net/manual/en/function.header.php
        //
        header('Location: room.php?id=1');
        exit;
    }
    break;
        
    default: 
    break;
}


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
<h1>Äventyrsspel</h1>
       <div id="right_col">
<p>
Välkommen att spela det magiska äventyrsspelet med Betty som är på promenad i skogen och 
letar efter lite äventyr.
</p>
<p>
<a href="{$_SERVER['PHP_SELF']}?game=start">Börja spela spelet</a> 
 | 
<a href="allrooms.php">Visa alla rummen (cheat)</a>
</p>
</div>
</div> <!-- wrapper -->

EOD;


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//

$title         = "Äventyrsspel";
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
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset={$charset};">
        <title>{$title}</title>
        <style type="text/css">{$stylesheet}</style>
        <link rel='stylesheet' href='css/main.css' type='text/css' media='screen' />
    </head>
    <body>        
        {$html}       
    </body>
</html>
EOD;


echo $html;
exit;

?> 