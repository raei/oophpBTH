<?php

// ===========================================================================================
//
// CCard.php
//
// Description: A class for a gamecard
//
// Author: Ralf Eriksson
// Card background pattern is from http://www.squidfingers.com/patterns/17/
//

class CCard {

    // -------------------------------------------------------------------------------------------
    //
    // Member variables
    //
    private $iCardPattern; // S (Spade), H (Hearts), C (Club), D (Diamond), X (special card)
    private $iCardValue;  // 1-13
    private $iFaceUpOrDown; // 0 down, 1 up

    // -------------------------------------------------------------------------------------------
    //
    // Constructor	
    // Always start with face down if not stated elsewise
    //
    function __construct($aCardPattern = 'H', $aCardValue = 1, $aFaceUpOrDown = 0) {       
        $this->iCardPattern = $aCardPattern;
        $this->iCardValue = $aCardValue;
        $this->iFaceUpOrDown = $aFaceUpOrDown;
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
    // Flip the cards up/down/inverse.	
    //
    public function FlipCard($aAction = 'inverse') {
            switch ($aAction) {
                case 'up': {
                    $this->iFaceUpOrDown = 1;
                } break;
                case 'down': {
                    $this->iFaceUpOrDown = 0;
                } break;
                case 'inverse':
                default: {
                    $this->iFaceUpOrDown = ($this->iFaceUpOrDown == 1) ? 0 : 1;
                } break;
           }//end switch
    }//end function FlipCard
     
    // -------------------------------------------------------------------------------------------
    //
    // Show the id of the card.
    //
    public function GetCardAsId() {
        return "{$this->iCardPattern}{$this->iCardValue} ({$this->iFaceUpOrDown})";
    }

    // -------------------------------------------------------------------------------------------
    //
    // Show the card as text (but only if faced up).
    // Use html special chars to make it look nicer.
    // Google for "html special chars"
    // Example on sprintf for formatting numbers in text  
    // 
    //
    public function GetCardAsText() {

        $token = Array(
            'H' => '&hearts;',
            'S' => '&spades;',
            'D' => '&diams;',
            'C' => '&clubs;',
            'X' => '&Theta;',
        );
        
           
        
        $cardText = "";
        
    
        if($this->iCardPattern == 'X'){
            $cardText.= 'JOKER';
        }else{
             if($this->iCardValue < 2 || $this->iCardValue > 10 )
             {
                $this->newValue =  $this->getPicturedCard($this->iCardValue);//ändrar kortet till ett klätt istället för siffra 
                $cardText.= sprintf("%s",$this->newValue);                 
            }else{
                $cardText.= sprintf("%2d",$this->iCardValue);               
            }
            $cardText.= '<br />';
            $cardText.= "&nbsp;";       
            $cardText.= sprintf("%s",$token[$this->iCardPattern] );
        }//end if else
            
        
        if ($this->iFaceUpOrDown == 1) {
            return $cardText;
        } 
    }//end function GetCardAsText
    
    /**----------------------------------------------------------------------------
    * 
    * Funktion för att byta ut siffran för klädda kort
    * 
    * 
    */
    private function getPicturedCard($value) {        
        
       switch($value)
       {
        case 1;
         $cardType = 'A';
         break;
        case 13;
         $cardType = 'K';
         break;
        case 12;
         $cardType = 'D';
         break;
        case 11;
         $cardType = 'J';
         break;
       }
      return  $cardType;
    }//end function getPicturedCard
  

    // -------------------------------------------------------------------------------------------
    //
    // Show the card as text and some easy css for style.
    //
    // Showing off some CSS   
    //
    public function GetCardAsBox() {
        $text = $this->GetCardAsText();
        $style = <<<EOD
            float: left; 
            margin: 5px 5px 5px 5px;
            padding: 1px 0px 21px 0px; 
            text-align: justify;
            text-indent:4px;
            background:	white;
            width: 80px; 
            height:100px;
            border: solid gray 1px;
            font-size:18px;
EOD;

        if ($this->iFaceUpOrDown == 0) {
            $text = "&nbsp;";
            $style .= "background: white url(images/pattern_057.gif) repeat;";
        }

        if ($this->iCardPattern == 'H' ||
                $this->iCardPattern == 'D') {
            $style .= "color: red;";
        }

        return "<div style='{$style}'>{$text}</div>";
    }
    
     // -------------------------------------------------------------------------------------------
    //
    // Show the card as text and some easy css for style.
    //
    // Showing off some CSS   
    //
    public function GetStartCardAsBox() {
       
        $style = <<<EOD
            float: left; 
            margin: 5px 5px 5px 5px;
            padding: 21px 0px 21px 0px; 
            text-align: center;
            background:	white;
            width: 80px; 
            height:80px;    
            border: solid gray 1px;
                
EOD;

          $text = "&nbsp;";
          $style .= "background: white url(images/pattern_057.gif) repeat;"; 
        

        return "<div style='{$style}'>{$text}</div>";
    }


    // -------------------------------------------------------------------------------------------
    //
    // Return the value of a card.
    //
    public function GetValue() {

        if ($this->iCardPattern == 'X')
            return 0;

        if ($this->iCardValue == 1)
            return 14;

        return $this->iCardValue;
    }

}// End of class
?>