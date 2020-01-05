<?php

namespace BrainGames\games\progression;

use function BrainGames\games\playGame;

use const BrainGames\games\QUESTIONS_COUNT;

const GAME_TITLE = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function run()
{
    $tasksList = createTaskGame();
    playGame(GAME_TITLE, $tasksList);
}

function createTaskGame()
{
    for ($i = 1; $i <= QUESTIONS_COUNT; $i++) {
        $beginNumber = rand(0, 99);
        $difference = rand(2, 9);
        $progression = getProgression($beginNumber, $difference, PROGRESSION_LENGTH);

        $hiddenElement = rand(0, count($progression) - 1);
        $answer = $progression[$hiddenElement];
        $progression[$hiddenElement] = '..';

        $question = implode(" ", $progression);
        $tasks[$question] = $answer;
    }
    return $tasks;
}

function getProgression($start, $diff, $length)
{
    for ($i = 0, $length -= 1; $i <= $length; $i++) {
        $progression[] = $start + $diff * $i;
    }
    return $progression;
}
