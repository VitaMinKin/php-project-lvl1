<?php

namespace BrainGames\games\even;

use function BrainGames\games\playGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = "Answer 'yes' if the number is even, otherwise answer 'no'";

function run()
{
    $tasksList  = createTaskGame();
    playGame(GAME_TITLE, $tasksList);
}

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $question = rand(0, 99);
        $answer = (isEven($question)) ? "yes" : "no";
        $tasks[$question] = $answer;
    }
    return $tasks;
}

function isEven($number)
{
    return $number % 2 === 0;
}
