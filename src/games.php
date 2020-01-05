<?php

namespace BrainGames\games;

use function cli\line;
use function cli\prompt;

const QUESTIONS_COUNT = 3;

function playGame($gameTitle, $tasks)
{
    line('Welcome to the Brain Games!');

    $userName = prompt('May i have your name?');
    line("Hello, %s! \n", $userName);

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
