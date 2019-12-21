<?php

namespace BrainGames\games\even;

use function BrainGames\games\startGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = "Answer 'yes' if the number is even, otherwise answer 'no'";

function run()
{
    $questionsList  = createTaskGame();
    startGame(GAME_TITLE, $questionsList);
}

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $randomNumber = rand(0, 99);
        $Answer = (isEven($randomNumber)) ? "yes" : "no";
        $questions[$randomNumber] = $Answer;
    }
    return $questions;
}

function isEven($number)
{
    return ($number % 2 === 0);
}
