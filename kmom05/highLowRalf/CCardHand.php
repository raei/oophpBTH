<?php
// ===========================================================================================
//
// CCardHand.php
//
// Description: A class for holding a hand of cards
//
// Author: Ralf Eriksson
//

require_once("CDeck.php");

class CCardHand {  

	// -------------------------------------------------------------------------------------------
	//
	// Member variables
	//
	// http://php.net/manual/en/language.oop5.constants.php
	//
	private $iCards;		// The picked cards in an array

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
		//$this->iCards[] = $aCard;
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
		$html = "<p><div style='float: left; background: green;'>";
		foreach($this->iCards as $card) {
			$html .= $card->GetCardAsBox();
		}
		// divClear used to clearing the float-left state in css.
		$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
		$html .= "</div>{$divClear}</p>";		
		
		return $html;
	}//end function GetCardsAsBox
	
} // End of class

?>