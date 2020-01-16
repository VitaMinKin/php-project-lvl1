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
    if (($number != 2) && (($number % 2 == 0) || ($number < 2))) {
        return false;
    }

    $devider = 3;
    $value = sqrt($number);

    while (($devider <= $value) and ($number % $devider != 0)) {
        $devider += 2;
    }
           
    return  $devider > $value;
}
