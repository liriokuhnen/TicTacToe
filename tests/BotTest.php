<?php

namespace Tests;

use PHPUnit_Framework_TestCase as TestCase;
use TicTacToe\Player\Bot;

class BotTest extends TestCase
{
    public function testRandomMove()
    {
        $bot = new Bot('o');
        $bot->setBoardStatus([
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ]);
        $bot->setAvailableChoices();
        $this->assertNotEmpty($bot->getRandomMove());
    }

    public function testRandomMoveEmpty()
    {
        $bot = new Bot('o');
        $bot->setBoardStatus([
            ['x', 'x', 'x'],
            ['x', 'x', 'x'],
            ['x', 'x', 'x']
        ]);
        $bot->setAvailableChoices();
        $this->assertEquals('', $bot->getRandomMove());
    }

    public function testSetBotType(){
        $bot = new Bot('o');
        $this->assertEquals('o', $bot->getType());
        $this->assertEquals('x', $bot->opponentType);
    }

    /**
     * @expectedException Exception
     */
    public function testSetInvalidBotType(){
        $bot = new Bot('y');
    }

    public function testSmartMoveAlwaysGetCenter(){
        $bot = new Bot('o');
        $bot->setBoardStatus([
            ['x', '', ''],
            ['', '', ''],
            ['', '', '']
        ]);
        $botMove = [
            ['x', '', ''],
            ['', 'o', ''],
            ['', '', '']
        ];

        $bot->setAvailableChoices();
        $bot->getSmartMove();

        $this->assertEquals($botMove, $bot->boardStatus);
    }

    public function testSmartMovePreventLose(){
        $bot = new Bot('o');
        $bot->setBoardStatus([
            ['x', '', 'x'],
            ['', 'o', ''],
            ['', '', '']
        ]);
        $botMove = [
            ['x', 'o', 'x'],
            ['', 'o', ''],
            ['', '', '']
        ];

        $bot->setAvailableChoices();
        $bot->getSmartMove();

        $this->assertEquals($botMove, $bot->boardStatus);
    }

    public function testSmartMovePreventLose2(){
        $bot = new Bot('o');
        $bot->setBoardStatus([
            ['x', '', ''],
            ['', 'o', ''],
            ['x', '', '']
        ]);
        $botMove = [
            ['x', '', ''],
            ['o', 'o', ''],
            ['x', '', '']
        ];

        $bot->setAvailableChoices();
        $bot->getSmartMove();

        $this->assertEquals($botMove, $bot->boardStatus);
    }

}