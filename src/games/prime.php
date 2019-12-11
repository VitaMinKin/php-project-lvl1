<?php

namespace BrainGames\games\prime;

use function BrainGames\games\start;
use function BrainGames\games\startGame;

const GAME_TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function run()
{
    $userName = start(GAME_TITLE);
    $listOfIssues = getQuestions();
    startGame($userName, $listOfIssues);
}

function getQuestions()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $number = rand(0, 99);
        $answer = (isPrime($number)) ? 'yes' : 'no';
        $questions[$number] = $answer;
    }
    return $questions;
}

function isPrime($testNumber)
{
    if ($testNumber % 2 == 0) {
        return false;
    }

    $d = 3; //Для перебора только нечетных чисел

    while (($d * $d <= $testNumber) and ($testNumber % $d != 0)) {
        $d += 2;
    }
           
    return  (($d * $d) > $testNumber);
}
