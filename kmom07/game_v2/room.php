 <?php
// ===========================================================================================
//
// room.php
//
// Description: Read information of a room from the database and display it as HTML.
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
// Take care of GET variables, and validate them
//

// Get the id of the room
$idRoom = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($idRoom === FALSE || $idRoom === NULL || $idRoom < 0) die("Felaktig _GET värde."); 

// ----------------------------------------------------------------------------
//
// Load room info into room-object
//
require_once('CRoom.php');
$room = new CRoom();
$room->ReadFromDatabase($idRoom);
echo mysql_error(); //Skriver ut felet på sidan

// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
    <div class="header">
        <h1>Äventyrsspel</h1>
        <h2>{$room->iTitle}</h2>
    </div>

    <div id="main">
        <div class='gamearea'>
        {$room->iGraphics}
        </div> <!-- gamearea -->
        <div id="right_col">
            <div class='description'>
            <h3>Beskrivning</h3>
            <p class='description'>
            {$room->iDescription}
            </p>
            </div> <!-- description -->
                <div class='action'>
                    <h3>Vägval</h3>
                    <p class='action'>
                        <ul>
                       {$room->iConnections} 
                        </ul>   
                    </p>
                </div> <!-- actions -->
        </div> <!-- end right_col-->
    </div> <!-- main -->    
</div> <!-- wrapper -->

EOD;

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');
$title         = "Äventyrsspel";
$charset     = "iso-8859-1";
$language    = "sv";
$stylesheet = "";

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset={$charset};">
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

//header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;

?> 