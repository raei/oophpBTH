<?php

// ===========================================================================================
//
// CCard.php
//
// Description: A class for a gamecard
//
// Author: Ralf Eriksson
//

class CCard {

    // 
    // Member variables
    //
    private $iCardPattern;  // S (Spade), H (Hearts),C (Club), D (Diamond), X (special card)
    private $iCardValue;    // 1-13
    private $iFaceUpOrDown; // 0 down, 1 up

    // Constructor  
    // Always start with face down if not stated elsewise
    //
    function __construct($aCardPattern = 'H', $aCardValue = 1, $aFaceUpOrDown = 0) {
        $this->iCardPattern = $aCardPattern;
        $this->iCardValue = $aCardValue;
        $this->iFaceUpOrDown = $aFaceUpOrDown;
    }

    // 
    // Destructor  
    //
    function __destruct() {
        ;
    }

    /* Används för att vända kortet, 1 argument som säger hur kortet skall 
     * vändas (up, down eller inverse). Up visar kortets framsida. 
     * Down visar kortets baksida. Inverse inverterar nuvarande visningsläge.
     */

    public function FlipCard($aAction = 'inverse') {
        switch ($aAction) {
            case 'up': {
                    $this->iFaceUpOrDown = 1;
                }
                break;
            case 'down': {
                    $this->iFaceUpOrDown = 0;
                }
                break;
            case 'inverse':
            default: {
                    $this->iFaceUpOrDown = ($this->iFaceUpOrDown == 1) ? 0 : 1;
                }
                break;
        }//end switch
    }//end function FlipCard

    /*
     * Returnera en sträng som anger vilket id ett kort har, tex ?S13 (0)? för 
     * spader kung med baksidan upp eller ?H2 (1)? för 
     * hjärter 2 med framsidan upp. Denna funktion visar alltid 
     * kortets värde oavsett om kortets baksida eller framsida är upp.
     */

    public function GetCardAsId() {
        return "{$this->iCardPattern}{$this->iCardValue} {$this->iFaceUpOrDown}";
    }

    /*
     * Visa en text-baserad representation av kortet. Visa siffran och 
     * specialtecken (? ? ? ?). Visa ? för joker. Visa XXX om baksidan är upp.
     */

    public function GetCardAsText() {
        $token = Array(
            'H' => '&hearts;',
            'S' => '&spades;',
            'D' => '&diams;',
            'C' => '&clubs;',
            'X' => '&Theta;',
        );

        if ($this->iFaceUpOrDown == 1) {
            return sprintf("%s%2d", $token[$this->iCardPattern], $this->iCardValue);
        } else {
            return "XXX";
        }
    }//end function GetCardAsText

    /*
     * Visar kortet i en div med enkel CSS för att skapa ramar och färger. 
     * Använder sig av GetCardAsText() för att visa själva kortets värde.
     */

    public function GetCardAsBox() {
        $text = $this->GetCardAsText();
        $style = <<<EOD
        float: left; 
        margin: 5px 5px 5px 5px;
        padding: 21px 0px 21px 0px; 
        text-align: center;
        background: white;
        width: 40px; 
        border: solid gray 1px;
EOD;

        if ($this->iFaceUpOrDown == 0) {
            $text = "&nbsp;";
            $style.= "background: white url(images/cardbackNew.png) repeat;";
        }

        if ($this->iCardPattern == 'H' ||
                $this->iCardPattern == 'D') {
            $style .= "color: red;";
        }

        return "<div style='{$style}'>{$text}</div>";
    }//end function GetCardAsBox
}// end of Class
?>
