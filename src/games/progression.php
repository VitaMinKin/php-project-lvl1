<?php

namespace BrainGames\games\progression;

use function BrainGames\games\startGame;

use const BrainGames\games\COUNT_QUESTIONS;

const GAME_TITLE = "What number is missing in the progression?";
const PROGRESSION_ELEMENTS = 10;

function run()
{
    $questionsList = createTaskGame();
    startGame(GAME_TITLE, $questionsList);
}

function createTaskGame()
{
    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        $beginNumber = rand(0, 99);
        $difference = rand(2, 9);
        $progression = getProgression($beginNumber, $difference);

        $randomElement = rand(0, count($progression) - 1);
        $answer = $progression[$randomElement];
        $progression[$randomElement] = '..';

        $question = implode(" ", $progression);
        $questions[$question] = $answer;
    }
    return $questions;
}

function getProgression($beginNumber, $difference)
{
    $progres = [$beginNumber];
    for ($i = 1; $i <= PROGRESSION_ELEMENTS - 1; $i++) {
        $progres[] = $progres[$i - 1] + $difference;
    }
    return $progres;
}
