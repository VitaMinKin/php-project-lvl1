<?php

namespace BrainGames\games\calc;

use function BrainGames\games\playGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function run()
{
    $tasksList = createTaskGame();
    playGame(GAME_TITLE, $tasksList);
}

function calculateAnswer($firstNum, $secondNum, $action)
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

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $randomOperate = rand(0, count(OPERATIONS) - 1);
        $operation = OPERATIONS[$randomOperate];

        $a = rand(0, 99);
        $b = rand(0, 9);
        
        $answer = calculateAnswer($a, $b, $operation);
        
        $question = "$a $operation $b";
        $tasks[$question] = $answer;
    }
    return $tasks;
}
