<?php

namespace BrainGames\games\gcd;

use function BrainGames\games\start;
use function BrainGames\games\startGame;

const GAME_TITLE = 'Find the greatest common divisor of given numbers.';

function run()
{
    $userName = start(GAME_TITLE);
    $listOfIssues = getQuestions();
    startGame($userName, $listOfIssues);
}

function getQuestions()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        do {    //Для усложнения задачи, выбираем только четные числа!
            $firstNum = rand(0, 99);
        } while ($firstNum % 2 === 1);

        do {
            $secondNum = rand(0, 99);
        } while ($secondNum % 2 === 1);

        $greatestCommonFactor = getNod($firstNum, $secondNum);
        $questions["$firstNum $secondNum"] = $greatestCommonFactor;
    }
    return $questions;
}

//Бинарный алгоритм вычисления НОД
function getNod($a, $b)
{
    $k = 1;
    while (($a != 0) && ($b != 0)) {
        while (($a % 2 === 0) && ($b % 2 === 0)) {
            $a /= 2;
            $b /= 2;
            $k *= 2;
        }
        while ($a % 2 === 0) {
            $a /= 2;
        }
            
        while ($b % 2 === 0) {
            $b /= 2;
        }

        if ($a >= $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $b * $k;
}
