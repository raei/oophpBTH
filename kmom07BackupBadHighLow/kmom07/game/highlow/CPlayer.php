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
                header('Location: gameover.php?reason=Hälsomätaren nådde 0');
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
            case 'increaseHealthFull': {
            $this->iHealthMeter = 10;
            }
            break;        
            case 'start': {                     
                header('Location:http://localhost/oophpBTH/kmom07_EgnaBanor/game_v2/adventure.php');               
            }
            break;
            
            case 'playGameHighLow': {
                header('Location:http://localhost/oophpBTH/kmom07_EgnaBanor/game_v2/highlow/highlow.php?game=init');
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

?> 