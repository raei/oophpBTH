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
	//
	private $iDeck;		// An instance of CDeck
	private $iHand;		// An instance of CCardHand


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
		$this->iDeck->InitAndShuffle();//vaskar kortleken
		$this->iHand->DropAllCards();//släng bort alla korten på handen
		$card = $this->iDeck->DealFromTop();//hämtar översta kortet från kortleken
                $card->FlipCard();//vänder upp det hämtatde kortet
		$this->iHand->AddCard($card);//lägg in kortet i min hand och lägg ut det på spelbordet		
	}


	// -------------------------------------------------------------------------------------------
	//
	// Guess and pick a card. Check if card value is higher or lower.
	// Take argument to check wether new card is to be higher or lower.
	// Check according to argument and return TRUE or FALSE
	//
	public function GuessAndPickCard($aGuess) {
                
		//$this->iHand->DropAllCards();//släng bort alla korten på handen
               // $this->iDeck->InitAndShuffle();//vaskar kortleken
		           
                $card1 = $this->iHand->GetLastCard();//hämtar sista kortet jag fick     
                $this->iHand->DropAllCards();//släng bort alla korten på handen för att få en ny hela tiden vill bara visa två kort på bordet

		$card2 = $this->iDeck->DealFromTop();//hämtar ett nytt kort från kortleken
                             
		$card2->FlipCard();//vänder upp det hämtatde kortet
		$this->iHand->AddCard($card2);////lägg in kortet i min hand och lägg ut det på spelbordet                
		
		$value1 = $card1->GetValue();
		$value2 = $card2->GetValue();
		
		// If joker, always return true
		if($value1 == 0 || $value2 == 0) {
			return TRUE;
		}
		
		$success = FALSE;
		switch($aGuess) {
			case 'high': {
				$success = ($value2 >= $value1);
			}
			break;
			
			case 'low': {
				$success = ($value2 <= $value1);
			}
			break;
		}//end switch
		
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
	//
	public function ShowGameStatus() {
		return $this->iHand->GetCardsAsBox();
	}


} // End of class

?>