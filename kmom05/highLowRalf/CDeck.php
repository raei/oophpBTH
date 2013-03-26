<?php

require_once("CCard.php");

class CDeck {

    // ------------------------------------------------------------------
    //
  // Member variables
    //
  // http://php.net/manual/en/language.oop5.constants.php
    //
  private $iCards;       // All cards in an array

  const cNumCards = 54;  // The amount of cards in this deck

    // ------------------------------------------------------------------
    //
  // Constructor
    // http://www.php.net/manual/en/language.oop5.decon.php

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
	// http://php.net/manual/en/control-structures.foreach.php
	// http://php.net/manual/en/control-structures.for.php
	// http://php.net/manual/en/control-structures.break.php
	//
	public function InitDeckWithCards() {
		$tokens = Array('S', 'H', 'C', 'D', 'X');	
		$pos = 1;

		foreach($tokens as $token) {

			for($i=1; $i<=13; $i++) {

				$this->iCards[$pos++]	= new CCard($token, $i, 0);

				if($token == 'X' && $i == 2) break;
			}			
		}
	}


	// -------------------------------------------------------------------------------------------
	//
	// Shuffle the existing cards in the deck.
	//
	// http://php.net/manual/en/function.shuffle.php
	//
	public function InitAndShuffle() {
		$this->InitDeckWithCards();
		shuffle($this->iCards); 
	}


	// -------------------------------------------------------------------------------------------
	//
	// Init and shuffle the whole deck.
	//
	// http://php.net/manual/en/function.shuffle.php
	//
	public function Shuffle() {
		shuffle($this->iCards); 
	}


	// -------------------------------------------------------------------------------------------
	//
	// DealFromTop, return the card from top of deck, mark as unpicked.
	//
	// http://php.net/manual/en/function.array-pop.php
	//
	public function DealFromTop() {
		return(array_pop($this->iCards)); 
	}

	
}// End of Class
?>
