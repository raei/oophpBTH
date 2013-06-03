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



if($idRoom === 5)  //om vi är vid eldplatsen
{  
  $_SESSION["lastTime"] =  time();  //we need to know when we entered   
  $debug .= "lastTime: " . time() . "<br />";
}else {      
  $lastTime = empty($_SESSION["lastTime"]) ? time() : $_SESSION["lastTime"]; 
  $currentTime = time();                          
  
  $debug .= "lastTime: " . $lastTime . "<br />";
  $debug .= "currentTime: " . $currentTime . "<br />";
  $debug .= "difference: " . ($currentTime - $lastTime) . "<br />";
  
  if($currentTime - $lastTime >= 10)    //if it have taken more than 10 seconds, refill health completely
  {
    $_SESSION["player"]->setHealthStatus();
  }
  
  $_SESSION["lastTime"] = 0;    //reset
} 

// Get the action-event if any
$actionEvent = isset($_GET['event']) ? $_GET['event'] : "";

// Get the action-item if any pickDice, pickChar and pickCards
$actionItem = isset($_GET['item']) ? $_GET['item'] : "";

// Add dice, letter and card image to item array 
$_SESSION['player']->AddItem($actionItem);
   
// ----------------------------------------------------------------------------
//
// Load room info into room-object
//
require_once('CRoom.php');
$room = new CRoom();

//Fixar en boolean i rumaction så att den sätts när du gjort en sak
if($actionEvent != NULL ){    
    //$room->SetStatus($idRoom,$actionEvent );    
    $_SESSION['player']->PerformActionEvent($actionEvent,$room,$idRoom );
}else if($actionItem != NULL ){
     //$room->SetStatus($idRoom,$actionItem );
     $_SESSION['player']->PerformActionEvent($actionItem,$room,$idRoom );  
}

//visar en alert om du inte har saken i ryggsäcken när du ska spela
$eventData = "";
$dataEvent = "";
if($_SESSION['player']->getPlayHangmanStatus() === FALSE and $actionEvent  === 'playHangman'){
    $eventData = "Du måste ha bokstäver med dig för att spela hangman.";
    $dataEvent = 'onClick=checkbox()';    
}else if($_SESSION['player']->getPlayDiceStatus() === FALSE and $actionEvent  === 'playDice') {
    $eventData = "Du måste ha tärningar med dig för att spela tärning.";
    $dataEvent = 'onClick=checkbox()';
}else if($_SESSION['player']->getPlayHighLowStatus()=== FALSE and $actionEvent  === 'playGameHighLow') {
    $eventData = "Du måste ha kortlek med dig för att spela kort.";
    $dataEvent = 'onClick=checkbox()';
}else{
    $dataEvent = '';
}

$room->ReadFromDatabase($idRoom,$dataEvent);

// Keep track on current room and decrease health-meter when entering a new room
$_SESSION['player']->SetCurrentRoomAndDecreaseHealtMeter($idRoom);

// När du fått tre nycklar visas slutbilden samt att inga händelser och länkar visas.
$action =null;
$conection = null;
if( $_SESSION['player']->getSizeOfKeys() === 3){   
    $room->changePicture("<embed type='image/svg+xml' src='img/slut.svg' width='707' height='480' />" ,"Bra jobbat! Nu seglar jag hem! Tack för hjälpen",'1');   
    if($idRoom === 1){  //kollar så att denna länk visas endast när du är i rum 1      
        $conection = "<li><a href='adventure.php'>Till startsidan</a></li> ";
    }else{
        $action =  $room->iActions;
        $conection = $room->iConnections;        
    }
}else{
 
    $action =  $room->iActions;
    $conection = $room->iConnections;
}



$debug .= 'Game initiated.';
$debug .= 'Current session id is: ' . session_id() . '<br />';

$itemList = $_SESSION['player']->getItems();//getItems from players itemlist

$htmlItems = "<table><tr>";

foreach ($itemList as $value) {
     $htmlItems .= "<td  style='padding-right: 40px;'>" . $value . '</td>';
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

$keyListImage = $_SESSION['player']->getKeys();//getKeys from players

$htmlKeys = "<table><tr>";

foreach ($keyListImage as $value) {
     $htmlKeys .= "<td  style='padding-right: 30px;'>" . $value . '</td>';
     $debug .= "Current items " . $htmlKeys ;
}   

$htmlKeys .= "  </tr></table>";


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>        
    <div class='header'>           
        <div class='keys'>
            <h2>Nycklar</h2> 
             {$htmlKeys}
        </div>
        <div class="items">
            <h2>Ryggsäck</h2>       
            {$htmlItems}                    
        </div>
        <div class='healthmeter'>
            <h2>Liv</h2>           
            {$htmlHearts}            
        </div>       
    </div><!-- end header --> 
        
    <div id="main">
        <div class='gamearea'>
            {$room->iGraphics}        
        </div> <!-- gamearea -->
            
   <div id="right_col">                    
        <div class='description'>
            <h3>{$room->iTitle}</h3>
           {$room->iDescription}
        </div> <!-- description -->
        <div class='actionChoise'>
            <h3>Vägval</h3>                    
            <ul>           
           {$conection} 
            </ul>                      
        </div> <!-- actionChoise -->                       
        <div class='actionEvents'>
            <h3>Händelser</h3>         
            {$action}           
        </div> <!-- actionEvents -->           
            
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