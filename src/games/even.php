<?php

namespace BrainGames\games\even;

use function BrainGames\games\start;
use function BrainGames\games\startGame;

const GAME_TITLE = "Answer 'yes' if the number is even, otherwise answer 'no'";

function run()
{
    $userName = start(GAME_TITLE);
    $listOfIssues = getQuestions();
    startGame($userName, $listOfIssues);
}

function getQuestions()
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
