<?php

namespace BrainGames\games;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;

function welcome($gameTitle)
{
    line('Welcome to the Brain Games!');
    if ($gameTitle != '') {
        line("{$gameTitle} \n");
    }
    return true;
}

function askUserName()
{
    $name = prompt('May i have your name?');
    line("Hello, %s! \n", $name);
    return $name;
}

function startGame($gameTitle, $tasks = [])
{
    welcome($gameTitle);
    $userName = askUserName();

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
