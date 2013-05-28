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
    private $iHealthMeter;      //Take care of players health status(int)
    private $iLastRoomVisited;  //Take care of players last room/nr status(int)
    private $iItems;            //Take care of img for picked up items(array)
    private $iHeartStatusList;  //Take care of heart/img health status(array)
    private $iPlayDiceStatus;   //Check to see if player played dice(bool)
    private $iPickDiceStatus;   //Check to see if player picked up dice(bool)
    private $iPickLetterStatus;
    private $iPlayHangManStatus;
    private $iPlayHighLowStatus;
    private $iCardStatus;

    // -------------------------------------------------------------------------------------------
    //
    // Constructor
    //
    function __construct() {
        $this->iHealthMeter = 10;
        $this->iLastRoomVisited = 1; // Always start in room 1
        $this->iItems = array();
        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
        $this->iCardStatus = FALSE;
        $this->iPlayDiceStatus = FALSE;
        $this->iPickDiceStatus = FALSE;
        $this->iPickLetterStatus = FALSE;
        $this->iPlayHangManStatus = FALSE;
        $this->iPlayHighLowStatus = FALSE;
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
            /*
              if(empty($this->iHeartStatusList)){
              header('Location: gameover.php?reason=Du käkade ett ruttet äpple så alla dina liv försvann');
              }
             * 
             */
        }
    }

    // -------------------------------------------------------------------------------------------
    //
    // Take care of the action-event.
    //
    //
    public function PerformActionEvent($aActionEvent) {

        switch ($aActionEvent) {
            case 'drinkWater': {
                    $this->iHealthMeter += 5;
                    for ($i = 0; $i < 5; $i++) {
                        array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    }
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }

                    header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=10');
                }
                break;

            case 'eatBanan': {
                    $this->iHealthMeter += 1;
                    array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=7'); //refresh site and events                 
                }

                break;

            case 'eatPear': {
                    $this->iHealthMeter += 1;
                    array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=5');
                }
                break;

            case 'eatStrawberry': {
                    $this->iHealthMeter += 1;
                    array_push($this->iHeartStatusList, "<img src ='img/heart.png'>");
                    if ($this->iHealthMeter > 10) {
                        $this->iHealthMeter = 10;
                        $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                    }
                    header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=6');
                }
                break;
            case 'eatAppel': {
                    $this->iHealthMeter -= 5;
                    for ($i = 0; $i < 5; $i++) {
                        array_pop($this->iHeartStatusList); //delete one heart each time
                    }

                    if ($this->iHealthMeter <= 0) {
                        $this->iHealthMeter = 0;
                        header("refresh:1; url=http://localhost/oophpBTH/kmom08_Ryggsack/game/gameover.php?reason=Passa dig för rutten frukt!");
                    }
                }
                break;
            case 'increaseHealthFull': {
                    $this->iHealthMeter = 10;
                    $this->iHeartStatusList = array_fill(1, 10, "<img src ='img/heart.png'>");
                }
                break;
            case 'start': {
                    //header('Location:http://www.student.bth.se/~raer12/oophp/kmom08/game/adventure.php');
                    header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/adventure.php');
                }
                break;

            case 'playGameHighLow': {
                    if ($this->getPlayHighLowStatus() === TRUE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/highlow/highlow.php?game=init');
                        $this->setPlayHighLowStatus(FALSE);
                    } else {
                       // header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=9');
                    }
                }
                break;

            case 'playHangman': {
                    if ($this->getPlayHangmanStatus() === TRUE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/hangman/hangman.php');
                        $this->setPlayHangmanStatus(FALSE);
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=4');
                    }
                }
                break;

            case 'playDice': {
                    if ($this->getPlayDiceStatus() === TRUE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/pigGame/pig.php?game=init');
                        $this->setPlayDiceStatus(FALSE);
                    } else {
                       // header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=8');
                    }
                }
                break;          

            case 'pickDice': {

                    //Check if you have pick up dice if not p              
                    if ($this->getPickDiceStatus() === FALSE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=5&item=pickDice');
                        $this->setPickDiceStatus(TRUE); //sign that you hav picked up dices
                        $this->setPlayDiceStatus(TRUE); //allow you to play dice
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=5');
                    }
                }
                break;

            case 'pickChar': {
                    if ($this->getLettertatus() === FALSE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=6&item=pickChar');
                        $this->setLetterStatus(TRUE);
                        $this->setPlayHangManStatus(TRUE); //allow you to play hangman
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=6');
                    }
                }
                break;

            case 'pickCards': {
                    if ($this->getCardStatus() === FALSE) {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=7&item=pickCards');
                        $this->setCardStatus(TRUE);
                        $this->setPlayHighLowStatus(TRUE); //allow you to play highlow                        
                    } else {
                        header('Location:http://localhost/oophpBTH/kmom08_Ryggsack/game/room.php?id=7');
                    }
                }
                break;

            default:
                break;
        }
    }

    public function getHearts() {
        return $this->iHeartStatusList;
    }

    public function getHealthStatus() {
        return $this->iHealthMeter;
    }

    public function setHealthStatus() {
        $this->iHealthMeter = 'GREAT!';
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

    public function getCardStatus() {
        return $this->iCardStatus;
    }

    public function setCardStatus($status) {
        $this->iCardStatus = $status;
    }

    public function getPlayHighLowStatus() {
        return $this->iPlayHighLowStatus;
    }

    public function setPlayHighLowStatus($status) {
        $this->iPlayHighLowStatus = $status;
    }

    public function setPlayHangmanStatus($status) {
        $this->iPlayHangManStatus = $status;
    }

    public function getPlayHangmanStatus() {
        return $this->iPlayHighLowStatus;
    }

    public function getLettertatus() {
        return $this->iPickLetterStatus;
    }

    public function setLetterStatus($status) {
        $this->iPickLetterStatus = $status;
    }

    public function getPlayDiceStatus() {
        return $this->iPlayDiceStatus;
    }

    public function setPlayDiceStatus($status) {
        $this->iPlayDiceStatus = $status;
    }

    public function getPickDiceStatus() {
        return $this->iPickDiceStatus;
    }

    public function setPickDiceStatus($status) {
        $this->iPickDiceStatus = $status;
    }

}

// End of class