<?php

namespace BrainGames\games\prime;

use function BrainGames\games\startGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function run()
{
    $questionsList = createTaskGame();
    startGame(GAME_TITLE, $questionsList);
}

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $a = rand(0, 99);
        $answer = (isPrime($a)) ? 'yes' : 'no';
        $questions[$a] = $answer;
    }
    return $questions;
}

function isPrime($testNumber)
{
    if (($testNumber != 2) && (($testNumber % 2 == 0) || ($testNumber < 2))) {
        return false;
    }

    $d = 3; //Для перебора только нечетных чисел

    while (($d * $d <= $testNumber) and ($testNumber % $d != 0)) {
        $d += 2;
    }
           
    return  (($d * $d) > $testNumber);
}
