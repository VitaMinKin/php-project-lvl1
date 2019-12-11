<?php

namespace BrainGames\games\calc;

use function BrainGames\games\start;
use function BrainGames\games\startGame;

const GAME_TITLE = 'What is the result of the expression?';

function run()
{
    $userName = start(GAME_TITLE);
    $questionsList = getQuestions();
    startGame($userName, $questionsList);
}

function getCorrectAnswer($firstNum, $secondNum, $action)
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

function getQuestions()
{
    $arithmeticOperator = ['+', '-', '*'];
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $firstNum = rand(0, 99);
        $secondNum = rand(0, 9);
        $randomOperate = rand(0, 2);

        $action = $arithmeticOperator[$randomOperate];

        $solution = getCorrectAnswer($firstNum, $secondNum, $action);
        
        $question = "$firstNum $action $secondNum";
        $questions[$question] = $solution;
    }
    return $questions;
}
