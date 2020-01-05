<?php

namespace BrainGames\games\prime;

use function BrainGames\games\playGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function run()
{
    $tasksList = createTaskGame();
    playGame(GAME_TITLE, $tasksList);
}

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $question = rand(0, 99);
        $answer = (isPrime($question)) ? 'yes' : 'no';
        $tasks[$question] = $answer;
    }
    return $tasks;
}

function isPrime($number)
{
    if (($number != 2) && (($number % 2 == 0) || ($number < 2))) {
        return false;
    }

    $d = 3; //Для перебора только нечетных чисел

    while (($d * $d <= $number) and ($number % $d != 0)) {
        $d += 2;
    }
           
    return  ($d * $d) > $number;
}
