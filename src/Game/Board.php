<?php

namespace TicTacToe\Game;

use Exception;

class Board
{
    public $boardStatus;
    public $availableChoices;
    public $rounds;
     
    public function setBoardStatus($boardStatus)
    {
        $this->boardStatus = $boardStatus;
    }
     
    public function getBoardStatus()
    {
        return $this->boardStatus;
    }

    public function setAvailableChoices()
    {   
        foreach ($this->boardStatus as $y => $y_value) {
            foreach ($y_value as $x => $x_value) {
                if($x_value == ''){
                    $this->availableChoices[] = "x${x}y{$y}";
                }
            }
        }
    }

    public function setPositionOnBoardXY($position, $player)
    {   if($this->boardStatus[$position[0]][$position[1]] != ''){
            throw new Exception('Position is not available');
        }
        $this->boardStatus[$position[0]][$position[1]] = $player;
    }

    public function countEmptySpace(){
        $count = 0;
        foreach ($this->boardStatus as $y => $y_value) {
            foreach ($y_value as $x => $x_value) {
                if($x_value == ''){
                    $count++;
                }
            }
        }
        return $count;
    }
}