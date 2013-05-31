<?php

class CPlayer {
	
	//Klassegenskaper	
	private $total_score = 0;	//Totalt antal poäng för alla rundor
	private $score_current_turn = 0;//Poängen nuvarande runda
        private $diceScoreRound = 0;    //Tar hant om reseten av poängen vid roll 1  
                
        //Konstruktor
	function __construct($ts,$sct){		
            $this->total_score = $ts;
            //$this->score_current_turn = $sct;      
            $this->diceScoreRound = $sct;
	}
	
	//Klassfunktioner
	public function calcTurn(){
		//Adderar rundans poäng till totalen
		$this->total_score += $this->score_current_turn;				
	}

	public function addRoll($dice_score){
		$this->score_current_turn = $this->score_current_turn + $dice_score;
                $this->diceScoreRound = $this->diceScoreRound + $dice_score;
	}	
	
	public function getTotalScore(){
		return $this->total_score;
	}
        
        public function getScoreThisTurn(){
		return  $this->score_current_turn;
	}  
        
        public function getDicsScore(){
            return $this->diceScoreRound;
        }
        
        public function getReduceScore(){
            $this->total_score -= $this->diceScoreRound;
        }       
}

?>