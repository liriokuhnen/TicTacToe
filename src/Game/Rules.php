<?php

namespace TicTacToe\Game;

use TicTacToe\Game\Board;

class Rules extends Board
{
    public $playerWinner;
    private $mapWinners = [
        // Horizontal
        [[0, 0], [1, 0], [2, 0]],
        [[0, 1], [1, 1], [2, 1]],
        [[0, 2], [1, 2], [2, 2]],
        
        // Vertical
        [[0, 0], [0, 1], [0, 2]],
        [[1, 0], [1, 1], [1, 2]],
        [[2, 0], [2, 1], [2, 2]],

        // Diagonal
        [[0, 0], [1, 1], [2, 2]],
        [[0, 2], [1, 1], [2, 0]],
    ];

    public function hasWinner()
    {
        $bs = $this->boardStatus;
        foreach ($this->mapWinners as $kmp => $mp) {
            if($bs[$mp[0][0]][$mp[0][1]] == $bs[$mp[1][0]][$mp[1][1]] && 
               $bs[$mp[1][0]][$mp[1][1]] == $bs[$mp[2][0]][$mp[2][1]]){
                $player = $bs[$mp[0][0]][$mp[0][1]];
                if($player != ''){
                    $this->playerWinner = $player;
                    return true;
                }
            }
        }
        return false;
    }
}