<?php

namespace BrainGames\games\progression;

use function BrainGames\games\start;
use function BrainGames\games\startGame;

const GAME_TITLE = "What number is missing in the progression?";
const AMOUNT_ELEMENTS = 10;

function run()
{
    $userName = start(GAME_TITLE);
    $listOfIssues = getQuestions();
    startGame($userName, $listOfIssues);
}

function getQuestions()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $beginNumber = rand(0, 99);
        $difference = rand(2, 9);
        $progression = getProgression($beginNumber, $difference);

        $randomElement = rand(0, count($progression));
        $answer = $progression[$randomElement];
        $progression[$randomElement] = '..';

        $question = implode(" ", $progression);
        $questions[$question] = $answer;
    }
    return $questions;
}

function getProgression($beginNumber, $difference)
{
    $progression = [$beginNumber];
    for ($i = 1; $i <= AMOUNT_ELEMENTS - 1; $i++) {
        $progres[] = $progres[$i - 1] + $difference;
    }
    return $progression;
}
