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
// Include class definitions
require_once('CPlayer.php'); 
 
 // Calling session_start
session_start();


// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = FALSE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Prepare the page content
//
$html = "";


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables, and validate them
//

// Get the id of the room
$idRoom = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($idRoom === FALSE || $idRoom === NULL || $idRoom < 0) die("Felaktig _GET värde."); 

// Get the action-event if any
$actionEvent = isset($_GET['event']) ? $_GET['event'] : "";

// ----------------------------------------------------------------------------
//
// Load room info into room-object
//
require_once('CRoom.php');
$room = new CRoom();
$room->ReadFromDatabase($idRoom);

// Perform the action-event, if any
$_SESSION['player']->PerformActionEvent($actionEvent);

// Keep track on current room and decrease health-meter when entering a new room
//if you are winning game set helth till odödlig

if($idRoom != 11){
    $_SESSION['player']->SetCurrentRoomAndDecreaseHealtMeter($idRoom);
}else{
     $_SESSION['player']->setHealthStatus();
}

$debug .= 'Game initiated.';
$debug .= 'Current session id is: ' . session_id() . '<br />';

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
            <div class='helthmeter'>
              <h3>Hälsa</h3>  
             <p class='action'>
               {$_SESSION['player']->iHealthMeter}
            </p>
            </div>
            <div class='description'>
            <h3>Beskrivning</h3>
            <p class='action'>
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
                <div class='actionEvents'>
                    <h3>Händelser</h3>                   
                       <p class='action'>{$room->iActions}</p>                  
                </div> <!-- actions -->                       
        </div> <!-- end right_col-->
    </div> <!-- main -->    
</div> <!-- wrapper -->

EOD;

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');//includes header footer
$title         = "Äventyrsspel";
$charset     = "iso-8859-1";
$language    = "sv";
$stylesheet = "";
$debug = $debugEnable ? $debug : "";

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset={$charset};">
        <title>{$title}</title>
        <style type="text/css">{$stylesheet}</style>
        <link rel='stylesheet' href='css/main.css' type='text/css' media='screen' />
    </head>
    <body>      
        {$html}
        {$debug}
    </body>
</html>
EOD;

echo $html;      
exit;
?>