<?php

namespace BrainGames\games;

use function cli\line;
use function cli\prompt;

define("COUNT_QUESTIONS", 3);

function start($gameTitle)
{
    line('Welcome to the Brain Games!');
    if ($gameTitle != '') {
        line("{$gameTitle} \n");
    }
    $name = prompt('May i have your name?');
    line("Hello, %s! \n", $name);
    return $name;
}

function startGame($userName, $tasks = [])
{
    foreach ($tasks as $question => $correctAnswer) {
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");

        if ($correctAnswer == $userAnswer) {
                line("Correct!");
        } else {
            line("'%s' is wrong answer! ;(. Correct answer was '%s'", $userAnswer, $correctAnswer);
            line("Let's, try again, %s!", $userName);
            exit();
        }
    }
    line("Congratulations, %s!", $userName);
}
