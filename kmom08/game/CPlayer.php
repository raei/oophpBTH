<?php
// ===========================================================================================
//
// CPlayer.php
//
// Description: A class for storing information on a player.
//
// Author: Ralf Eriksson
//


class CPlayer {  

    // -------------------------------------------------------------------------------------------
    //
    // Member variables
    //
    public $iHealthMeter;
    public $iLastRoomVisited;
    

    // -------------------------------------------------------------------------------------------
    //
    // Constructor
    //
    function __construct() {
        $this->iHealthMeter = 10;
        $this->iLastRoomVisited = 1; // Always start in room 1
    }


    // -------------------------------------------------------------------------------------------
    //
    // Destructor
    //
    function __destruct() {
        ;
    }


    // -------------------------------------------------------------------------------------------
    //
    // SetCurrentRoomAndDecreaseHealtMeter
    //
    // Check if room-id has changed. Store the new room-id and decrease the 
    // health-meter. If the health-meter has reached 0 then redirect to 
    // page that shows gameover.
    //
    //
    public function SetCurrentRoomAndDecreaseHealtMeter($aId) {
        
        if($aId != $this->iLastRoomVisited) {
            $this->iLastRoomVisited = $aId;
            $this->iHealthMeter--;
            
            if($this->iHealthMeter <= 0) {
                header('Location: gameover.php?reason=H�lsom�taren n�dde 0');
            }
        }
    }
    

    // -------------------------------------------------------------------------------------------
    //
    // Take care of the action-event.
    //
    //
    public function PerformActionEvent($aActionEvent) {

        switch($aActionEvent) {
            case 'increaseHealthBy5': {
                $this->iHealthMeter += 5;
                if($this->iHealthMeter > 10) {
                    $this->iHealthMeter = 10;                    
                }
            }
            break;
            case 'eatFruit': {
                $this->iHealthMeter += 1;
                if($this->iHealthMeter > 10) {
                    $this->iHealthMeter = 10;                    
                }
            }
            break;
            case 'eatAppel': {
                $this->iHealthMeter = 0;       
                //header('Location:http://localhost/oophpBTH/kmom08/game/gameover.php');  
            }
            break;
            case 'increaseHealthFull': {
            $this->iHealthMeter = 10;
            }
            break;        
            case 'start': {                     
                //header('Location:http://www.student.bth.se/~raer12/oophp/kmom08/game/adventure.php');
                header('Location:http://localhost/oophpBTH/kmom08/game/adventure.php');                
            }
            break;
            
            case 'playGameHighLow': {
                //header('Location:http://www.student.bth.se/~raer12/oophp/kmom08/game/highlow/highlow.php?game=init');
                 header('Location:http://localhost/oophpBTH/kmom08/game/highlow/highlow.php?game=init');                
                
            }
            break;    
         
            case 'dice': {
                //header('Location:http://www.student.bth.se/~raer12/oophp/kmom08/game/pigGame/pig.php?game=init');
                 header('Location:http://localhost/oophpBTH/kmom08/game/pigGame/pig.php?game=init');                
            }
            break;
        
           case 'hangman': {
                //header('Location:http://www.student.bth.se/~raer12/oophp/kmom08/game/pigGame/pig.php?game=init');
                 header('Location:http://localhost/oophpBTH/kmom08/game/hangman/hangman.php');                
            }
            break;

            default:
            break;
        }
    }
    
    public function getHealthStatus(){
        return $this->iHealthMeter;
    }
    
    public function setHealthStatus(){
        $this->iHealthMeter = 'GREAT!';
    }
} // End of class