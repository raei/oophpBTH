<?php

// ===========================================================================================
//
// CHighCardLowCard.php
//
// Description: A class for playing the game of High Card Low Card
//
// Author: Ralf Eriksson
//

require_once("CDeck.php");
require_once("CCardHand.php");

class CHighCardLowCard {

    // -------------------------------------------------------------------------------------------
    //
    // Member variables	
    //
	private $iDeck;  // An instance of CDeck
    private $iHand;  // An instance of CCardHand

    // -------------------------------------------------------------------------------------------
    //
    // Constructor	
    //
    function __construct() {
        $this->iDeck = new CDeck();
        $this->iHand = new CCardHand();
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
    // Start the game.
    //
    public function StartGame() {
        $this->iDeck->InitAndShuffle();
        $this->iHand->DropAllCards();
        $card = $this->iDeck->DealFromTop();
        $card->FlipCard();
        //$this->iHand->AddCard($card);
        $this->iHand->AddCard($this->iDeck->DealFromTop()); // Add next card faced down, looks nicer
    }

    // -------------------------------------------------------------------------------------------
    //
    // Guess and pick a card. Check if card value is higher or lower.
    // Take argument to check wether new card is to be higher or lower.
    // Check according to argument and return TRUE or FALSE
    //
    public function GuessAndPickCard($aGuess) {
        $card1 = $this->iHand->GetLastCard();
        $card2 = $this->iDeck->DealFromTop();
        $card2->FlipCard();
        $this->iHand->AddCard($card2);

        $value1 = $card1->GetValue();
        $value2 = $card2->GetValue();

        // If joker, always return true
        if ($value1 == 0 || $value2 == 0) {
            return TRUE;
        }

        $success = FALSE;
        switch ($aGuess) {
            case 'high': {
                    $success = ($value2 >= $value1);
                }
                break;

            case 'low': {
                    $success = ($value2 <= $value1);
                }
                break;
        }

        return $success;
    }//end function GuessAndPickCard

    // -------------------------------------------------------------------------------------------
    //
    // Return the points which is equal to the number of cards in the cardhand.
    //
    public function GetPoints() {
        return $this->iHand->GetNoCards() - 1;
    }

    // -------------------------------------------------------------------------------------------
    //
    // Show HTML for the current game status.
    //
    public function ShowGameStatus() {
        return $this->iHand->GetCardsAsBox();
    }
}// end class
?>