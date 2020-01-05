<?php

namespace BrainGames\games\gcd;

use function BrainGames\games\playGame;

use const BrainGames\games\QUESTIONS_COUNT;

const GAME_TITLE = 'Find the greatest common divisor of given numbers.';

function run()
{
    $tasksList = createTaskGame();
    playGame(GAME_TITLE, $tasksList);
}

function chooseEvenNumber()
{
    //Для усложнения задачи, функция возвращает только четные числа!
    do {
        $a = rand(0, 99);
    } while ($a % 2 === 1);
    return $a;
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

function createTaskGame()
{
    for ($i = 1; $i <= QUESTIONS_COUNT; $i++) {
        $a = chooseEvenNumber();
        $b = chooseEvenNumber();
        
        $answer = gcd($a, $b);
        $tasks["$a $b"] = $answer;
    }
    return $tasks;
}
