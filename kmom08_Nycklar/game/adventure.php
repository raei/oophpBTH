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
        $room->resetEventData();//�terst�ll rumevent data i DB
        
        $debug .= "Session destroyed and re-created.";
    }
    break;

    case 'start':   {                         // Go to the first room
        
        if(!isset($_SESSION['player'])) {            // Init the session with a new player
            $_SESSION['player'] = new CPlayer();    // if not already done before.
        }
        
        //Fixar rummen s� att du har r�tt bild och text vid start
        require_once('CRoom.php');
        $room = new CRoom();
        $room->changePicture("<embed type='image/svg+xml' src='img/stranden.svg' width='707' height='480' /> ","Du �r strandsatt p� en �de �. B�ten som kan ta dig hem �r l�st med ett stort h�ngl�s. En s�ker d�d v�ntar dig om du inte lyckas hitta tre nycklar som finns p� �n. Med dessa kan du l�sa upp det stora l�set till b�ten och segla hem. Lycka till! Kom ih�g att ha koll p� din energiniv�." ,'1' );
        $room->changeText("Du kommer till en v�gkorsning. H�r m�ste du fundera noga p� vilken v�g du ska ta.", '2');
        $room->changePicture("<embed type='image/svg+xml' src='img/utgrotta.svg' width='707' height='480' />","Framf�r dig finns en lucka av tr� i marken. N�r du �ppnar den ser du trappsteg som leder ner i en grotta. Det ser m�rkt och kallt ut i grottan, men �nd� lite sp�nnande. Se upp du vet aldrig vad som v�ntar i m�rkret.",'3' );
        $room->changeText("Du �r mitt i den djupa grottan. Du ser inte s�rskilt bra. Endast ett svagt ljussken lyser bakom dig fr�n en gammal oljelampa. Antingen sticker du eller s� spelar du hangman.",'4' );
           
        $room->changePicture("<embed type='image/svg+xml' src='img/eldplatsen.svg' width='707' height='480' /> ","Du har hittat en eldstad vila en stund och kolla lite." ,'5' );
        $room->changePicture("<embed type='image/svg+xml' src='img/djupa_skogen.svg' width='707' height='480' /> ","Du �r mitt i skogen och ser lite vilsen ut. Det ser n�stan ut som om det b�rjar m�rkna, men kanske �r det bara ett moln... Du ser dig om och funderar �t vilket h�ll som du b�r forts�tta... Nu g�ller det..." ,'6' );
        $room->changePicture("<embed type='image/svg+xml' src='img/havet.svg' width='707' height='480' /> ","Du har hittat stranden se dig om kring och jobba lite nu." ,'7' );
        $room->changeText("Du kommer fram till en v�ldigt konstig stad. Se dig omkring.", '8');
        $room->changeText("Du vandrar l�ngs v�gen och ser en man. Han ser ut att ha en kortlek. Han vill nog spela kort med dig.", '9');
        $room->changePicture("<embed type='image/svg+xml' src='img/borgen.svg' width='707' height='480' /> ","Fin borg du k�nner dig t�rstig.",'10' );     
        $room->changeText("Tack f�r hj�lpen nu seglar jag hem.", '11');
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
    <h1>�ventyrsspel</h1>
       <div class="start">
            <p>
                V�lkommen att spela det magiska �ventyrsspelet med Oscar som �r strandsatt
                    p� en �de � och m�ste hitta nyckeln till b�ten f�r att kunna segla hem.
            </p>
          
        <ul>
            <li><a href="{$_SERVER['PHP_SELF']}?game=start">B�rja spela spelet</a> </li>
            <li><a href="{$_SERVER['PHP_SELF']}?game=initsession">F�rst�r sessionen (b�rja om)</a></li>
            <li><a href="{$_SERVER['PHP_SELF']}?game=cheet">Visa alla rummen (cheat)</a></li>
            
        </ul>

        </div>
</div> <!-- wrapper -->

EOD;


// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//

$title         = "�ventyrsspel";
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