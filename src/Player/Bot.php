<?php

namespace TicTacToe\Player;

use TicTacToe\Game\Rules;
use Exception;

class Bot extends Rules
{
	public $type;
    public $opponentType;
	private $type_optionals = ['x', 'o'];

	public function __construct($type)
	{
		if(!in_array($type, $this->type_optionals)){
			throw new Exception('Type not available');
		}
    	$this->type = $type;
        $this->opponentType = $type == $this->type_optionals[0] ? $this->type_optionals[1] : $this->type_optionals[0];
   	}

	public function getType()
	{
		return $this->type;
	}

    public function getRandomMove()
    {
        if(count($this->availableChoices)<=0){
            return '';
        }
        $return_move = $this->availableChoices[array_rand($this->availableChoices, 1)];
        $this->setPositionOnBoardXY([substr($return_move, 3, 1), substr($return_move, 1, 1)], $this->type);
        return $return_move;
    }

    public function getSmartMove()
    {
        if(count($this->availableChoices)<=0){
            return '';
        }

        $round = $this->countEmptySpace();
        
        //Always get the center position
        if($round == 8 && $this->boardStatus[1][1] == ''){
        	$return_move = 'x1y1';
        } else {
        	$return_move = $this->preventLose();
        }

        if(!$return_move){
        	return $this->getRandomMove();
        }

        $this->setPositionOnBoardXY([substr($return_move, 3, 1), substr($return_move, 1, 1)], $this->type);
        return $return_move;
    }

    public function preventLose(){
    	foreach ($this->availableChoices as $humanMove) {
    		$rules = new Rules();
        	$rules->setBoardStatus($this->boardStatus);
        	$rules->setPositionOnBoardXY([substr($humanMove, 3, 1), substr($humanMove, 1, 1)], $this->opponentType);
        	if($rules->hasWinner() == true){
        		return $humanMove;
        	}
    	}
    	return false;
    }
}