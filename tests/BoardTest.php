<?php

namespace Tests;

use PHPUnit_Framework_TestCase as TestCase;
use TicTacToe\Game\Board;

class BoardTest extends TestCase
{
    public function testSetBoard()
    {
        $boardStatus = [
            ['x', 'o', 'x'],
            ['0', 'x', '0'],
            ['0', 'x', '0']
        ];
        $board = new Board();

        $board->setBoardStatus($boardStatus);
        $this->assertEquals($boardStatus, $board->getBoardStatus());
    }

    public function testSetPositionOnBoard()
    {
        $boardStatus = [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];
        $boardStatusToCompare = [
            ['x', 'x', 'x'],
            ['o', 'o', 'o'],
            ['x', 'x', 'x']
        ];
        $board = new Board();
        $board->setBoardStatus($boardStatus);
        $board->setPositionOnBoardXY([0,0], 'x');
        $board->setPositionOnBoardXY([0,1], 'x');
        $board->setPositionOnBoardXY([0,2], 'x');
        $board->setPositionOnBoardXY([1,0], 'o');
        $board->setPositionOnBoardXY([1,1], 'o');
        $board->setPositionOnBoardXY([1,2], 'o');
        $board->setPositionOnBoardXY([2,0], 'x');
        $board->setPositionOnBoardXY([2,1], 'x');
        $board->setPositionOnBoardXY([2,2], 'x');
        $this->assertEquals($boardStatusToCompare, $board->getBoardStatus());
    }

    /**
     * @expectedException Exception
     */
    public function testSetInvalidPositionOnBoard()
    {
        $boardStatus = [
            ['x', '', ''],
            ['', '', ''],
            ['', '', '']
        ];
        $board = new Board();
        $board->setBoardStatus($boardStatus);
        $board->setPositionOnBoardXY([0,0], 'x');
    }

    public function testCountEmptySpace(){
        $boardStatus = [
            ['x', 'o', 'x'],
            ['o', 'x', 'o'],
            ['o', '', '']
        ];
        $board = new Board();
        $board->setBoardStatus($boardStatus);
        $this->assertEquals(2, $board->countEmptySpace());
    }

}