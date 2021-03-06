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
if($idRoom === FALSE || $idRoom === NULL || $idRoom < 0) die("Felaktig _GET v�rde."); 

// Get the action-event if any
$actionEvent = isset($_GET['event']) ? $_GET['event'] : "";

// Get the action-item if any
$actionItem = isset($_GET['item']) ? $_GET['item'] : "";

$_SESSION['player']->AddItem($actionItem);

$items = $_SESSION['player']->getItems();


   
// ----------------------------------------------------------------------------
//
// Load room info into room-object
//
require_once('CRoom.php');
$room = new CRoom();

//Fixar en boolean i rumaction s� att den s�tts n�r du gjort en sak
if($actionEvent != NULL ){    
    $room->SetStatus($idRoom,$actionEvent );    
    $_SESSION['player']->PerformActionEvent($actionEvent);
}else if($actionItem != NULL ){
     $room->SetStatus($idRoom,$actionItem );
     $_SESSION['player']->PerformActionEvent($actionItem);  
}


$eventData = "";
$dataEvent = "";
if($_SESSION['player']->getPlayHangmanStatus() === FALSE and $actionEvent  === 'playHangman'){
    $eventData = "Du m�ste ha bokst�ver med dig f�r att spela hangman.";
    $dataEvent = 'onClick=checkbox()';    
}else if($_SESSION['player']->getPlayDiceStatus() === FALSE and $actionEvent  === 'playDice') {
    $eventData = "Du m�ste ha t�rningar med dig f�r att spela t�rning.";
    $dataEvent = 'onClick=checkbox()';
}else if($_SESSION['player']->getPlayHighLowStatus()=== FALSE and $actionEvent  === 'playGameHighLow') {
    $eventData = "Du m�ste ha kortlek med dig f�r att spela kort.";
    $dataEvent = 'onClick=checkbox()';
}else{
    $dataEvent = '';
}

$room->ReadFromDatabase($idRoom,$dataEvent);



// Keep track on current room and decrease health-meter when entering a new room
//if you are winning game set helth till od�dlig

if($idRoom != 11){
    $_SESSION['player']->SetCurrentRoomAndDecreaseHealtMeter($idRoom);
}else{
     $_SESSION['player']->setHealthStatus();
}

$debug .= 'Game initiated.';
$debug .= 'Current session id is: ' . session_id() . '<br />';

$itemList = $_SESSION['player']->getItems();//getItems from players itemlist

$htmlItems = "<table><tr>";

foreach ($itemList as $value) {
     $htmlItems .= "<td  style='padding-left: 40px;'>" . $value . '</td>';
     $debug .= "Current items " . $htmlItems ;
}   

$htmlItems .= "  </tr></table>";

$heartListImage = $_SESSION['player']->getHearts();//getHearts from players

$htmlHearts = "<table><tr>";

foreach ($heartListImage as $value) {
     $htmlHearts .= "<td  style='padding-left: 5px;'>" . $value . '</td>';
     $debug .= "Current items " . $htmlHearts ;
}   

$htmlHearts .= "  </tr></table>";



// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
    <div class="header">
        <h1>�ventyrsspel</h1>
        <h2>{$room->iTitle}</h2>        
    </div>
    <div id="main">
        <div class='gamearea'>
            {$room->iGraphics}        
        </div> <!-- gamearea -->
        <div id="right_col">
        <div class='healthmeter'>
            <h3>Liv</h3>           
            {$htmlHearts}            
        </div>
        <div class='description'>
            <h3>Beskrivning</h3>
           {$room->iDescription}
        </div> <!-- description -->
        <div class='actionChoise'>
            <h3>V�gval</h3>                    
            <ul>
           {$room->iConnections} 
            </ul>                      
        </div> <!-- actionChoise -->                       
        <div class='actionEvents'>
            <h3>H�ndelser</h3>                   
           {$room->iActions}              
        </div> <!-- actionEvents -->   
        <div class="items">
            <h3>Ryggs�ck</h3>       
            {$htmlItems}                    
        </div>
            
        </div> <!-- end right_col-->
    </div> <!-- main -->    
</div> <!-- wrapper -->

EOD;

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');//includes header footer
$title         = "�ventyrsspel";
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
            <script type="text/javascript">
function checkbox() {
 alert('{$eventData}');  
}
</script>
       
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