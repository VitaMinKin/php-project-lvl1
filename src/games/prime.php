<?php

namespace BrainGames\games\prime;

use function BrainGames\games\playGame;

use const BrainGames\games\QUESTIONS_COUNT;

const GAME_TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function run()
{
    $tasksList = createTaskGame();
    playGame(GAME_TITLE, $tasksList);
}

function createTaskGame()
{
    for ($i = 1; $i <= QUESTIONS_COUNT; $i++) {
        $question = rand(0, 99);
        $answer = (isPrime($question)) ? 'yes' : 'no';
        $tasks[$question] = $answer;
    }
    return $tasks;
}

function isPrime($number)
{
    if (isNotSuitableNumber($number)) {
        return false;
    }

    $d = 3; //Для перебора только нечетных чисел

    while (($d * $d <= $number) and ($number % $d != 0)) {
        $d += 2;
    }
           
    return  ($d * $d) > $number;
}

function isNotSuitableNumber($number)
{
    return ($number != 2) && (($number % 2 == 0) || ($number < 2));
}
