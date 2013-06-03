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
    private $iHealthMeter;          //Take care of players health status(int)
    private $iLastRoomVisited;      //Take care of players last room/nr status(int)
    private $iItems;                //Take care of img for picked up items(array)
    private $iHeartStatusList;      //Take care of health status with image of hearts(array)    
    private $iPickDiceStatus;       //Check to see if player picked up dice(bool)
    private $iPickLetterStatus;     //Check to see if player picked up letter(bool)
    private $iPickCardStatus;       //Check to see if player picked up card(bool)
    private $iPickBananStatus;      //Check to see if player picked up banan(bool)
    private $iPickPearStatus;       //Check to see if player picked up pear(bool)
    private $iPickStrawberryStatus; //Check to see if player picked up strawberry(bool)




    private $iPlayHangManStatus;    //Check to see if player played hangman(bool)
    private $iPlayHighLowStatus;    //Check to see if player played highlow(bool)
    private $iPlayDiceStatus;       //Check to see if player played dice(bool)
    private $iGoldenKeys;           //Take care of key image(array) 



    // -------------------------------------------------------------------------------------------
    //
    // Constructor
    //
    function __construct() {
        $this->iHealthMeter = 10;
        $this->iLastRoomVisited = 1; // Always start in room 1
        $this->iItems = array();
        $this->iGoldenKeys = array();
        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
        $this->iPickCardStatus = FALSE;       
        $this->iPickDiceStatus = FALSE;
        $this->iPickLetterStatus = FALSE;
        $this->iPickBananStatus = FALSE;
        $this->iPlayHangManStatus = FALSE;
        $this->iPlayHighLowStatus = FALSE;
        $this->iPlayDiceStatus = FALSE;
        $this->iPickPearStatus = FALSE;
        $this->iPickStrawberryStatus = FALSE;
        
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

        if ($aId != $this->iLastRoomVisited) {
            $this->iLastRoomVisited = $aId;
            $this->iHealthMeter--;
            array_pop($this->iHeartStatusList); //delete one heart each time
            //unset($iHeartStatusList["<img src ='img/heart.png'>"]);//fel här han tar inte bort bild

            if ($this->iHealthMeter <= 0) {
                header('Location: gameover.php?reason=Dina liv är förbrukade');
            }           
        }
    }

    // -------------------------------------------------------------------------------------------
    //
    // Take care of the action-event.
    //
    //
    public function PerformActionEvent($aActionEvent,$room, $idRoom) {

        switch ($aActionEvent) {
            case 'transfer': {
                $slump = rand(2, 11);
                
                    switch ($slump){                        
                         case 2: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=1');
                             break;
                         }
                         case 3: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=3');
                             break;
                         }
                         case 4: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=4');
                             break;
                         }
                         case 5: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=5');
                             break;
                         }
                         case 6: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=6');
                             break;
                         }
                         case 7: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=7');
                             break;
                         }
                         case 8: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=8');
                             break;
                         }
                         case 9: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=9');
                             break;
                         }
                         case 10: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=10');
                             break;
                         }
                         case 11: {
                             header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11');
                             break;
                         }
                            default:
                            break;
                    }
                   
                    //header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=2');
                }
               // $room->SetStatus($idRoom, $aActionEvent );
                break;
            
            case 'drinkWater': {
                    $this->iHealthMeter += 5;
                    for ($i = 0; $i < 5; $i++) {
                        array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    }
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    
                    $room->changePicture("<embed type='image/svg+xml' src='img/borgenTomFlaska.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 5, fina drycker!",'10' );
                   
                    header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=10');
                }
                $room->SetStatus($idRoom, $aActionEvent );
                break;

            case 'eatBanan': {
                    $this->setPickBananStatus(TRUE);
                    $this->iHealthMeter += 1;
                    array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    if($this->getPickCardStatus() === TRUE){
                        $room->changePicture("<embed type='image/svg+xml' src='img/havetTom.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'7' );
                    }else{
                           $room->changePicture("<embed type='image/svg+xml' src='img/havetBanan.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'7' );
                    }    
                    
                    header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=7'); //refresh site and events                 
                }
                 $room->SetStatus($idRoom, $aActionEvent );

                break;

            case 'eatPear': {
                    $this->setPickPearStatus(TRUE);
                    $this->iHealthMeter += 1;
                    array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    if($this->getPickDiceStatus() === TRUE){
                        $room->changePicture("<embed type='image/svg+xml' src='img/eldplatsenTom.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'5' );
                    }else{
                           $room->changePicture("<embed type='image/svg+xml' src='img/eldplatsenParon.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'5' );
                    }  
                    header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=5');
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;

            case 'eatStrawberry': {
                    $this->setPickStrawberryStatus(TRUE);
                    $this->iHealthMeter += 1;
                    array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    if($this->getPickLetterStatus() === TRUE){
                        $room->changePicture("<embed type='image/svg+xml' src='img/djupa_skogenTom.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'6' );
                    }else{
                         $room->changePicture("<embed type='image/svg+xml' src='img/djupa_skogenJordgubbe.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'6' );
                    }  
                    header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=6');
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;
            case 'eatAppel': {
                    $this->iHealthMeter -= 1;
                    for ($i = 0; $i < 1; $i++) {
                        array_pop($this->iHeartStatusList); //delete one heart each time
                    }

                    if ($this->iHealthMeter <= 0) {
                        $this->iHealthMeter = 0;
                        header("refresh:1; url=http://localhost/oophpBTH/kmom08_Nycklar/game/gameover.php?reason=Passa dig för rutten frukt!");
                    }
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;
            case 'increaseHealthFull': {
                 if ($this->iHealthMeter < 10) {
                    $this->iHealthMeter = 10;
                    $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                 }
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;
            case 'start': {
                    //header('Location:http://www.student.bth.se/~raer12/oophp/kmom08/game/adventure.php');
                    header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/adventure.php');
                }
                break;

            case 'playGameHighLow': {
                    if ($this->getPlayHighLowStatus() === TRUE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/highlow/highlow.php?game=init');
                        $this->setPlayHighLowStatus(FALSE);
                        $this->iGoldenKeys[] = "<img src ='image/golden_key.png'>";
                        $room->SetStatus($idRoom, $aActionEvent );
                    } 
                   /* if(sizeof($this->iGoldenKeys)=== 3){
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11');
                        //header("refresh:1; url=http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11");
                    }*/
                }
                 
                break;

            case 'playHangman': {
                    if ($this->getPlayHangmanStatus() === TRUE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/hangman/hangman.php');
                        $this->setPlayHangmanStatus(FALSE);
                        $this->iGoldenKeys[] = "<img src ='image/golden_key.png'>";//when playing hangman you get a key
                        $room->SetStatus($idRoom, $aActionEvent );                        
                    } 
                    /*if(sizeof($this->iGoldenKeys) === 3){
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11');
                       //header("refresh:1; url=http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11");
                    }*/
                }
                 
                break;

            case 'playDice': {
                    if ($this->getPlayDiceStatus() === TRUE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/pigGame/pig.php?game=init');
                        $this->setPlayDiceStatus(FALSE);
                        $this->iGoldenKeys[] = "<img src ='image/golden_key.png'>";
                        $room->SetStatus($idRoom, $aActionEvent );
                        //Här tar du bort länken till spelet
                    } 
                    /*if(sizeof($this->iGoldenKeys) === 3){
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11');
                        //header("refresh:1; url=http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=11");
                    }*/
                }
                 
                break;          

            case 'pickDice': {
                    //Check if you have pick up dice if not p              
                    if ($this->getPickDiceStatus() === FALSE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=5&item=pickDice');
                        $this->setPickDiceStatus(TRUE); //sign that you hav picked up dices
                        $this->setPlayDiceStatus(TRUE); //allow you to play dice
                        if($this->getPickPearStatus() === TRUE){
                            $room->changePicture("<embed type='image/svg+xml' src='img/eldplatsenTom.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'5' );
                        }else{
                           $room->changePicture("<embed type='image/svg+xml' src='img/eldplatsenDice.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'5' );
                        }  
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=5');
                    }
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;
            case 'pickChar': {
                    if ($this->getPickLetterStatus() === FALSE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=6&item=pickChar');
                        $this->setPickLetterStatus(TRUE);
                        $this->setPlayHangManStatus(TRUE); //allow you to play hangman
                        if($this->getPickStrawberryStatus() === TRUE){
                            $room->changePicture("<embed type='image/svg+xml' src='img/djupa_skogenTom.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'6' );
                        }else{
                           $room->changePicture("<embed type='image/svg+xml' src='img/djupa_skogenLetters.svg' width='707' height='480' /> "," Du har nu fyllt på ditt liv med 1!",'6' );
                        }  
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=6');
                    }
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;
            case 'pickCards': {
                    if ($this->getPickCardStatus() === FALSE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=7&item=pickCards');
                        $this->setPickCardStatus(TRUE);
                        $this->setPlayHighLowStatus(TRUE); //allow you to play highlow 
                        if($this->getPickBananStatus() === TRUE){
                            $room->changePicture("<embed type='image/svg+xml' src='img/havetTom.svg' width='707' height='480' /> "," Du har nu lagt kortleken i din ryggsäck!",'7' );
                        }else{
                               $room->changePicture("<embed type='image/svg+xml' src='img/havetCard.svg' width='707' height='480' /> "," Du har nu lagt kortleken i din ryggsäck!",'7' );
                        }
                        
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Nycklar/game/room.php?id=7');
                    }
                }
                 $room->SetStatus($idRoom, $aActionEvent );
                break;

            default:
                break;
        }
    }

    public function getHearts() {
        return $this->iHeartStatusList;
    }
    
    public function getKeys() {
        return $this->iGoldenKeys;
    }   
    
    public function getSizeOfKeys() {
        return sizeof($this->iGoldenKeys);
    }          

    public function getHealthStatus() {
        return $this->iHealthMeter;
    }

    public function setHealthStatus() {
       // $this->iHealthMeter = 'GREAT!';
         $this->iHeartStatusList = array_fill(1, 11, "<img src ='img/heart.png'>");
          $this->iHealthMeter = 11;
    }

    public function AddItem($item) {
        if ($item != null) {
            if ($item === 'pickCards') {
                $this->iItems[] = "<img src ='img/cardBack.png'>";
            } else if ($item === 'pickChar') {
                $this->iItems[] = "<img src ='img/abc.png'>";
            } else if ($item === 'pickDice') {
                $this->iItems[] = "<img src ='img/dice.png'>";
            }
        }
    }

    public function getItems() {
        return $this->iItems;
    }
   
    /*-------------------------------------------------------------------------
     * Keep track of if you have played any of the games in the story     
     -------------------------------------------------------------------------*/
    public function getPlayDiceStatus() {
        return $this->iPlayDiceStatus;
    }

    public function setPlayDiceStatus($status) {
        $this->iPlayDiceStatus = $status;
    }

    public function getPlayHighLowStatus() {
        return $this->iPlayHighLowStatus;
    }

    public function setPlayHighLowStatus($status) {
        $this->iPlayHighLowStatus = $status;
    }    

    public function getPlayHangmanStatus() {
        return $this->iPlayHangManStatus;
    }
    
    public function setPlayHangmanStatus($status) {
        $this->iPlayHangManStatus = $status;
    }

    /*-------------------------------------------------------------------------
     * Keep track of things you pick up in the game     * 
     -------------------------------------------------------------------------*/
    
    public function getPickBananStatus() {
        return $this->iPickBananStatus;
    }

    public function setPickBananStatus($status) {
        $this->iPickBananStatus = $status;
    }
    
    public function getPickPearStatus() {
        return $this->iPickPearStatus;
    }

    public function setPickPearStatus($status) {
        $this->iPickPearStatus = $status;
    }
    
     public function getPickStrawberryStatus() {
        return $this->iPickStrawberryStatus;
    }

    public function setPickStrawberryStatus($status) {
        $this->iPickStrawberryStatus = $status;
    }
    
    
    public function getPickLetterStatus() {
        return $this->iPickLetterStatus;
    }

    public function setPickLetterStatus($status) {
        $this->iPickLetterStatus = $status;
    }
    
    public function getPickCardStatus() {
        return $this->iPickCardStatus;
    }

    public function setPickCardStatus($status) {
        $this->iPickCardStatus = $status;
    }    

    public function getPickDiceStatus() {
        return $this->iPickDiceStatus;
    }

    public function setPickDiceStatus($status) {
        $this->iPickDiceStatus = $status;
    }

}// End of class