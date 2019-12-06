<?php

namespace BrainGames\games\calc;

use function BrainGames\games\start;
use function BrainGames\games\bodyGame;

define('GAME_TITLE', 'What is the result of the expression?');

function run()
{
    bodyGame(start(GAME_TITLE), generateGame());
}

function getSolution($firstNum, $secondNum, $action)
{
    switch ($action) {
        case '+':
            $solution = $firstNum + $secondNum;
            break;
        case '-':
            $solution = $firstNum - $secondNum;
            break;
        case '*':
            $solution = $firstNum * $secondNum;
            break;
    }
    return $solution;
}

//Получим задание на игру!
function generateGame()
{
    $countQuest = 3;
    $arithmeticOperator = ['+', '-', '*'];
    for ($i = 1; $i <= $countQuest; $i++) {
        $firstNum = rand(0, 99);
        $secondNum = rand(0, 9);
        $randomOperate = rand(0, 2);

        $action = $arithmeticOperator[$randomOperate];

        $solution = getSolution($firstNum, $secondNum, $action);
        
        $task = "$firstNum $action $secondNum";
        $gameTasks[$task] = $solution;
    }
    return $gameTasks;
}
