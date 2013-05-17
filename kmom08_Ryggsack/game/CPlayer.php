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
    private $iHealthMeter;
    private $iLastRoomVisited;
    private $iItems;
    

    // -------------------------------------------------------------------------------------------
    //
    // Constructor
    //
    function __construct() {
        $this->iHealthMeter = 10;
        $this->iLastRoomVisited = 1; // Always start in room 1
        $this->iItems = array();
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
        
            case 'pickDice': {                
                $test = TRUE;
                foreach ($this->iItems as $value) {
                     if($value === "<img src ='img/dice.png'>"){
                         $test = FALSE;
                     }               
                }  
                
                if($test === TRUE){
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=5&item=dice');  
                }  else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=5'); 
                } 
            }
            break;
            
            case 'pickChar': {                
                $test = TRUE;
                foreach ($this->iItems as $value) {
                     if($value === "<img src ='img/abc.png'>"){
                         $test = FALSE;
                     }               
                }  
                
                if($test === TRUE){
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=6&item=letters');  
                }  else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=6'); 
                } 
            }
            break;
            
              case 'pickCards': {                
                $test = TRUE;
                foreach ($this->iItems as $value) {
                     if($value === "<img src ='img/cardBack.png'>"){
                         $test = FALSE;
                     }               
                }  
                
                if($test === TRUE){
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=7&item=cards');  
                }  else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=7'); 
                } 
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
   /* 
    public function AddItem($item) {
        if($item != null)
        $this->iItems[] = $item;
    }*/
    
    public function AddItem($item) {
        if($item != null)
        { 
            if($item === 'cards'){
                $this->iItems[] = "<img src ='img/cardBack.png'>";
            }else if($item === 'letters') {
                $this->iItems[] = "<img src ='img/abc.png'>";
            }else if($item === 'dice'){
                $this->iItems[] = "<img src ='img/dice.png'>";
            }        
        }
    }
    
    public function getItems(){
        return $this->iItems;
    }

} // End of class