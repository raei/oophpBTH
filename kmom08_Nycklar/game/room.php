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

// ----------------------------------------------------------------------------
//
// Load room info into room-object
//
require_once('CRoom.php');
$room = new CRoom();


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables, and validate them
//

// Get the id of the room
$idRoom = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($idRoom === FALSE || $idRoom === NULL || $idRoom < 0) die("Felaktig _GET v�rde.");

$test = empty($_GET['test']) ? 0 : $_GET['test'];
$debug.= "Ralf1 test: " . $test;

if($idRoom === 10 or $idRoom === 2 and  $_SESSION["player"]->getPickStrawberryStatus() === TRUE and $_SESSION["player"]->getPickLetterStatus() === TRUE ){
    
    $room->changeText("H�r har du varit redan " , '6');
}
if($idRoom === 8 or $idRoom === 1 and  $_SESSION["player"]->getPickCardStatus() === TRUE and $_SESSION["player"]->getPickBananStatus() === TRUE ){
    
    $room->changeText("H�r har du varit redan " , '7');
}
if($idRoom === 9 or $idRoom === 2 and  $_SESSION["player"]->getPickDiceStatus() === TRUE and $_SESSION["player"]->getPickPearStatus() === TRUE ){
    
    $room->changeText("H�r har du varit redan " , '5');
}


//Fixar s� att du f�r fullt med liv om du stannar vid eldplatsen mer �n 10sek
if($idRoom === 5 and $test === 0)  //om vi �r vid eldplatsen
{        
  $_SESSION["lastTime"] =  time();  //kollar n�r vi kom dit   
  $debug .= "lastTime: " . time() . "<br />";
  header("refresh:10; url=http://www.student.bth.se/~raer12/oophp/kmom08/game/room.php?id=5&test=1");
    
}else if($idRoom === 5 and $test === '1') {      
  $lastTime = empty($_SESSION["lastTime"]) ? time() : $_SESSION["lastTime"]; 
  $currentTime = time();  
  
  if($currentTime - $lastTime >= 9)    //if it have taken more than 10 seconds, refill health completely
  {
    $_SESSION["player"]->setHealthStatus();    
    $room->changeText("Du vilade en stund vilket gjorde att du fyllde p� fullt med energi", 5);
  }  
  $_SESSION["lastTime"] = 0;    //reset
} 

// Get the action-event if any
$actionEvent = isset($_GET['event']) ? $_GET['event'] : "";

// Get the action-item if any pickDice, pickChar and pickCards
$actionItem = isset($_GET['item']) ? $_GET['item'] : "";

// Add dice, letter and card image to item array 
$_SESSION['player']->AddItem($actionItem);
   

//Fixar en boolean i rumaction s� att den s�tts n�r du gjort en sak
if($actionEvent != NULL ){         
    $_SESSION['player']->PerformActionEvent($actionEvent,$room,$idRoom );
}else if($actionItem != NULL ){     
     $_SESSION['player']->PerformActionEvent($actionItem,$room,$idRoom );  
}

//visar en alert om du inte har saken i ryggs�cken n�r du ska spela
$eventData = "";
$dataEvent = "";
if($_SESSION['player']->getPlayHangmanStatus() === FALSE and $actionEvent  === 'playHangman'){
    $eventData = "Det saknas bokst�ver i din ryggs�cken f�r att spela hangman.";
    $dataEvent = 'onClick=checkbox()';    
}else if($_SESSION['player']->getPlayDiceStatus() === FALSE and $actionEvent  === 'playDice') {
    $eventData = "Det saknas t�rningarna i din ryggs�cken f�r att spela.";
    $dataEvent = 'onClick=checkbox()';
}else if($_SESSION['player']->getPlayHighLowStatus()=== FALSE and $actionEvent  === 'playGameHighLow') {
    $eventData = "Du saknar en kortlek i din ryggs�ck f�r att spela kort.";
    $dataEvent = 'onClick=checkbox()';
}else{
    $dataEvent = '';
}

$room->ReadFromDatabase($idRoom,$dataEvent);

// Keep track on current room and decrease health-meter when entering a new room
$_SESSION['player']->SetCurrentRoomAndDecreaseHealtMeter($idRoom);

// N�r du f�tt tre nycklar visas slutbilden samt att inga h�ndelser och l�nkar visas.
$action =null;
$conection = null;
if( $_SESSION['player']->getSizeOfKeys() === 3){   
    $room->changePicture("<embed type='image/svg+xml' src='img/slut.svg' width='707' height='480' />" ,"Bra jobbat! Nu seglar jag hem! Tack f�r hj�lpen",'1');   
    if($idRoom === 1){  //kollar s� att denna l�nk visas endast n�r du �r i rum 1      
        $conection = "<li><a href='adventure.php'>Till startsidan</a></li> ";
    }else{
        $action =  $room->iActions;
        $conection = $room->iConnections;  
        //$room->changeText("" , $idRoom);//Tar bort ruminformationen efter att du varit i ett rum
    }
}else{ 
    $action =  $room->iActions;
    $conection = $room->iConnections;
   // $room->changeText("" , $idRoom);//Tar bort ruminformationen efter att du varit i ett rum
}

//$debug .= 'Game initiated.';
//$debug .= 'Current session id is: ' . session_id() . '<br />';

//h�mta nycklar
$keyListImage = $_SESSION['player']->getKeys();//getKeys from players
//visa nycklar
$htmlKeys = "<table><tr>";
foreach ($keyListImage as $value) {
     $htmlKeys .= "<td  style='padding-right: 30px;'>" . $value . '</td>';
     //$debug .= "Current items " . $htmlKeys ;
}   
$htmlKeys .= "  </tr></table>";
//h�mta ryggs�ckens saker
$itemList = $_SESSION['player']->getItems();//getItems from players itemlist
$htmlItems = "<table><tr>";
foreach ($itemList as $value) {
     $htmlItems .= "<td  style='padding-right: 40px;'>" . $value . '</td>';
    // $debug .= "Current items " . $htmlItems ;
}   
$htmlItems .= "  </tr></table>";
//h�mta energi
$heartListImage = $_SESSION['player']->getHearts();//getHearts from players
$htmlHearts = "<table><tr>";
foreach ($heartListImage as $value) {
     $htmlHearts .= "<td  style='padding-left: 5px;'>" . $value . '</td>';
    // $debug .= "Current items " . $htmlHearts ;
}
$htmlHearts .= "  </tr></table>";



// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>        
    <div class='header'>           
        <div class='keys'>
            <h2>NYCKLAR</h2> 
             {$htmlKeys}
        </div>
        <div class="items">
            <h2>RYGGS�CK</h2>       
            {$htmlItems}                    
        </div>
        <div class='healthmeter'>
            <h2>ENERGI</h2>           
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
            <h3>V�gval</h3>                    
            <ul>           
                {$conection} 
            </ul>                      
        </div> <!-- actionChoise -->                       
        <div class='actionEvents'>
            <h3>H�ndelser</h3> 
                <ul>
                    {$action}
                 </ul> 
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