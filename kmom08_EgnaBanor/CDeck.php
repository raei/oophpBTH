<?php

// ===========================================================================================
//
// CDeck.php
//
// Description: A class for handling a card of deck with 2 jokers
//
// Author: Ralf Eriksson
//

require_once("CCard.php");

class CDeck {

    // ------------------------------------------------------------------
    //
    // Member variables
    //
    //
    private $iCards;       // All cards in an array

    const cNumCards = 54;  // The amount of cards in this deck

    // ------------------------------------------------------------------
    //
    // Constructor
    //
    function __construct() {
        $this->iCards = Array();
        $this->InitDeckWithCards();
    }

    /* Definition for destructor goes here */
    function __destruct() {
        ;
    }

    // -------------------------------------------------------------------------------------------
    //
    // Init the deck with all cards.
    //	
    //
    public function InitDeckWithCards() {
    $tokens = Array('S', 'H', 'C', 'D', 'X');
    $pos = 1;

        foreach ($tokens as $token) {

            for ($i = 1; $i <= 13; $i++) {

                $this->iCards[$pos++] = new CCard($token, $i, 0);

                if ($token == 'X' && $i == 2)
                    break;
            }
        }//end foreach
    }//end function InitDeckWithCards

    // -------------------------------------------------------------------------------------------
    //
    // Shuffle the existing cards in the deck.
    //
	public function InitAndShuffle() {
        $this->InitDeckWithCards();
        shuffle($this->iCards);
    }

    // -------------------------------------------------------------------------------------------
    //
    // Init and shuffle the whole deck.
    //	
    public function Shuffle() {
        shuffle($this->iCards);
    }

    // -------------------------------------------------------------------------------------------
    //
    // DealFromTop, return the card from top of deck, mark as unpicked.
    //
    public function DealFromTop() {
        return(array_pop($this->iCards));
    }
}// End of Class
?>
