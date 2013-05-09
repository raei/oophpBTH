 <?php
// ===========================================================================================
//
// allrooms.php
//
// Description: Show all rooms in the database
//
//
// Author: Ralf Eriksson
//


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
// Since nowdox is not available (need PHP 5.3.0) I will instead prepend each $ with a \ 
// to prevent it from being evaluated. It works fine. But nowdoc would be better.
// 
// http://php.net/manual/en/language.types.string.php (nowdoc, heredoc)
// http://php.net/manual/en/function.eval.php
//
$html = "";

$htmlTemplate = <<<EOD
<div class='wrapper'>
<h2>{\$room->iTitle}</h2>

<div class='gamearea'>
{\$room->iGraphics}
</div> <!-- gamearea -->

<div class='description'>
<h4>Beskrivning:</h4>
<p class='description'>{\$room->iDescription}</p>
</div> <!-- description -->

<div class='action'>
<h4>Riktningar:</h4>
<p class='action'>{\$room->iConnections}</p>
</div> <!-- actions -->
 
</div> <!-- wrapper -->
    

EOD;


// ----------------------------------------------------------------------------
//
// Go through all rooms
//
// http://php.net/manual/en/function.eval.php
//
require_once('CRoom.php');
$room = new CRoom();


for($i=1; $i<=$room->CountRooms(); $i++) {    
    $room->ReadFromDatabase($i); 
    $html .= <<<EOD
<p>
<a href='room.php?id={$room->iId}'>Gå till rummet '{$room->iTitle}'</a>
</p>
EOD;
    eval("\$html .= \"{$htmlTemplate}\";");
}//end for


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');
$title         = "Visa alla rum";
$charset     = "iso-8859-1";
$language    = "sv";
$stylesheet = "";

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