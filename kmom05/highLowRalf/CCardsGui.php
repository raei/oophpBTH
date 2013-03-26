<?php

class CCardsGui {

	private $_deck;

	function __construct(){
		$suits = array("&hearts;", "&diams;", "&clubs;", "&spades;"); // HTML Entities of the symbols ♥♦♣♠
		$faces = array ("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
		foreach ($suits as $suit) {
			foreach ($faces as $face) {
				$deck[] = array("value"=>$face,"suit"=>$suit);
			}
		}
		$this->_deck = $deck;
		$this->shuffleDeck();
	}
	
	public function saveHand($hand,$tag){
		if(session_id() == '') session_start();
		$_SESSION['hand'][$tag] = json_encode($hand);
	}
	
	public function saveExists($tag){
		if(session_id() == '') session_start();
		if(!isset($_SESSION['hand'][$tag])) return false;
		return true;
	}
	
	public function loadHand($tag){
		if(session_id() == '') session_start();
		$hand = json_decode($_SESSION['hand'][$tag]);
		foreach($hand as $h){
			$face = reset(explode("&",$h));
			$suit = "&".end(explode("&",$h));
			foreach($this->_deck as $key=>$d){
				if($d["value"] == $face && $d["suit"] == $suit){
					unset($this->_deck[$key]);
				}
			}
		}
		return $hand;
	}
	
	public function eraseSave($tag){
		if(session_id() == '') session_start();
		unset($_SESSION['hand'][$tag]);
	}
	
	public function draw($num,array $hand = array()){
		$cardsInDeck = count($this->_deck);
		$num = ($num > $cardsInDeck) ? $cardsInDeck : $num; // X Cards in the deck left, make sure it never goes over.
		for($i=0; $i<$num; $i++){
			$card = array_shift($this->_deck); // array_shift selects (and deletes) top value
			$hand[] = $card['value'].$card['suit']; 
		}
		return $hand;
	}
	
	public function showCard($card,$clip = false){
		$width = 71; $height = 97; $offset = 1;
		$faces = array(array("J","Q","K","A"),array(11,12,13,1));
		$suits = array(array("&clubs;","&hearts;","&spades;","&diams;"),array(1,2,3,4));
		$face = str_replace($faces[0],$faces[1],substr($card,0,strlen($card)-1)) - 1;
		$suit = str_replace($suits[0],$suits[1],substr($card,1,strlen($card))) - 1;
		$right = $offset + $face*$width + ($face*$offset); // Face Value
		$down = $offset + $suit*$height + ($suit*$offset); // Suits Value             
                
		if($clip) $width = 20; 
		$html = "<span style=\"display:inline-block;background-color:#666;width:{$width}px;height:{$height}px;background-image:url('./images/deck2.png');background-position: -{$right}px -{$down}px;\"></span>";
		return $html;
	}
	
	public function showHidden($clip = false){
		$width = 71;
		if($clip) $width = 20;
		$html = "<span style=\"display:inline-block;background-color:#666;width:{$width}px;height:96px;background-image:url('./images/deck2.png');background-position: -2px -393px;\"></span>";
		return $html;
	}
	
	public function shuffleDeck(){
		shuffle($this->_deck);
	}
	
	public function getDeck(){
		return $this->_deck;
	}
	
	public function getCardValue($card){
		$face = reset(explode("&",$card));
		$faces = array(array("J","Q","K","A"),array(11,12,13,1));
		$face = str_replace($faces[0],$faces[1],$face);
		return $face;
	}
	
	public function isRoyal($card){
		$face = reset(explode("&",$card));
		if(in_array($face,array("J","Q","K","A"))) return true;
		return false;
	}
}
?>