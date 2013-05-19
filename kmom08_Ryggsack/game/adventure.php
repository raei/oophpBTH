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


 // Load class definitions before calling session_start
require_once('CPlayer.php');            
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
// Take care of GET variables
//
$doGame    = (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {
    case 'initsession': { // Destroy and then initiate the session
        require('ISessionDestroy.php');
        //
        // Initiating a session and storing an object in the session variable
        //
        //
        session_start();          // Must call again if we just destroyed
                                   // the session.
        session_regenerate_id();  // To avoid problems
        
        require_once('CRoom.php');
        $room = new CRoom();
        $room->resetEventData();//återställ rumevent data i DB
        
        $debug .= "Session destroyed and re-created.";
    }
    break;

    case 'start':   {                         // Go to the first room
        
        if(!isset($_SESSION['player'])) {            // Init the session with a new player
            $_SESSION['player'] = new CPlayer();    // if not already done before.
        }
        
        //
        // Make a redirect to the first room
        //
        //header('Location: room.php?id=1');
        header('Location: room.php?id=1');
        exit;
    }
    break;
    
    case 'cheet':   {                         // Go to the first room
        
        if(!isset($_SESSION['player'])) {            // Init the session with a new player
            $_SESSION['player'] = new CPlayer();    // if not already done before.
        }
        

        //
        // Make a redirect to the first room
        //
        header('Location: allrooms.php?id=1');
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
       <div class="start">
            <p>
                Välkommen att spela det magiska äventyrsspelet med Oscar som är strandsatt
                    på en öde Ö och måste hitta nyckeln till båten för att kunna segla hem.
            </p>
          
        <ul>
            <li><a href="{$_SERVER['PHP_SELF']}?game=start">Börja spela spelet</a> </li>
            <li><a href="{$_SERVER['PHP_SELF']}?game=initsession">Förstör sessionen (börja om)</a></li>
            <li><a href="{$_SERVER['PHP_SELF']}?game=cheet">Visa alla rummen (cheat)</a></li>
            
        </ul>

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