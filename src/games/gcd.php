<?php

namespace BrainGames\games\gcd;

use function BrainGames\games\startGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = 'Find the greatest common divisor of given numbers.';

function run()
{
    $questionsList = createTaskGame();
    startGame(GAME_TITLE, $questionsList);
}

function chooseEvenNumbers()
{
    //Для усложнения задачи, функция возвращает только четные числа!
    do {
        $a = rand(0, 99);
    } while ($a % 2 === 1);
    return $a;
}

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $a = chooseEvenNumbers();
        $b = chooseEvenNumbers();
        
        $answer = getGreatestCommonFactor($a, $b);
        $questions["$a $b"] = $answer;
    }
    return $questions;
}

//Бинарный алгоритм вычисления НОД
function getGreatestCommonFactor($a, $b)
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
