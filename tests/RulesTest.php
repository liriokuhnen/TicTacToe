<?php

namespace Tests;

use PHPUnit_Framework_TestCase as TestCase;
use TicTacToe\Game\Rules;

class RulesTest extends TestCase
{
    public function testHasNoWinner()
    {
        $boardStatus = [
            ['x', 'o', 'x'],
            ['o', 'x', 'o'],
            ['o', 'x', 'o']
        ];
        $rules = new Rules();
        $rules->setBoardStatus($boardStatus);
        $this->assertFalse($rules->hasWinner());
    }

    public function testPlayerXWinner()
    {
        $boardStatus = [
            ['x', 'x', 'x'],
            ['o', '', 'o'],
            ['o', 'x', 'o']
        ];
        $rules = new Rules();
        $rules->setBoardStatus($boardStatus);
        $this->assertTrue($rules->hasWinner());
        $this->assertEquals('x', $rules->playerWinner);
    }

    public function testPlayerOWinner()
    {
        $boardStatus = [
            ['x', '', 'o'],
            ['o', 'o', 'x'],
            ['o', 'x', '']
        ];
        $rules = new Rules();
        $rules->setBoardStatus($boardStatus);
        $this->assertTrue($rules->hasWinner());
        $this->assertEquals('o', $rules->playerWinner);
    }

    public function testAllWinnersPossibilities()
    {
        
        foreach ($this->allWinnersPossibilities as $allWinners) {
            $rules = new Rules();
            $rules->setBoardStatus($allWinners);
            $this->assertTrue($rules->hasWinner());
        }
    }

    private $allWinnersPossibilities = [
        [['x', 'x', 'x'], ['', '', ''], ['', '', '']],
        [['', '', ''], ['x', 'x', 'x'], ['', '', '']],
        [['', '', ''], ['', '', ''], ['x', 'x', 'x']],
        [['x', '', ''], ['x', '', ''], ['x', '', '']],
        [['', 'x', ''], ['', 'x', ''], ['', 'x', '']],
        [['', '', 'x'], ['', '', 'x'], ['', '', 'x']],
        [['x', '', ''], ['', 'x', ''], ['', '', 'x']],
        [['', '', 'x'], ['', 'x', ''], ['x', '', '']]
    ];
}