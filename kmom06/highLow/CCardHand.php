<?php
// ===========================================================================================
//
// CCardHand.php
//
// Description: A class for holding a hand of cards
//
//  Author: Ralf Eriksson
//

require_once("CDeck.php");

class CCardHand {  

	// -------------------------------------------------------------------------------------------
	//
	// Member variables
	//	
	//
	private $iCards; // The picked cards in an array

	// -------------------------------------------------------------------------------------------
	//
	// Constructor	
	//
	function __construct() {
		$this->iCards = Array();
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
	// Add a card to the hand
	//	
	//
	public function AddCard($aCard) {
            array_push($this->iCards, $aCard);
	}

	// -------------------------------------------------------------------------------------------
	//
	// Drop all cards from the hand.
	//
	public function DropAllCards() {
            $this->iCard = Array();
	}
	
	// -------------------------------------------------------------------------------------------
	//
	// Show all cards on the hand using HTML and CSS.
	//
	public function GetCardsAsBox() {
		$html = "<p><div style='float: left; background: black;'>";
		foreach($this->iCards as $card) {
			$html .= $card->GetCardAsBox();
		}
                $html .= $card->GetStartCardAsBox();
		// divClear used to clearing the float-left state in css.
		$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
		$html .= "</div>{$divClear}</p>";		
		
		return $html;
	}//end function GetCardsAsBox
        
        // -------------------------------------------------------------------------------------------
	//
	// Return the last card dealed to the hand.
	//
	public function GetLastCard() {
		return $this->iCards[count($this->iCards)-1];
	}

	// -------------------------------------------------------------------------------------------
	//
	// Get the number of cards on the hand.
	//
	public function GetNoCards() {
		return count($this->iCards);	                
        }
} // End of class

?>