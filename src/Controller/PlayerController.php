<?php

namespace TicTacToe\Controller;

use TicTacToe\Player\Bot;

Class PlayerController 
{
    public function getNextMove($board_status, $player_type, $player_level)
    {
        $tictactoe = new Bot($player_type);
        $tictactoe->setBoardStatus($board_status);
        $tictactoe->setAvailableChoices();
        if($player_level == 'easy'){
        	return $tictactoe->getRandomMove();	
        } else if ($player_level == 'medium'){
        	return $tictactoe->getSmartMove();	
        }
        
    }
}