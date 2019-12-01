<?php

namespace BrainGames\games\numbers;

use function BrainGames\games\start;
use function cli\prompt;
use function cli\line;

function run()
{
    getNum(start('brainEven'));
}

function getNum($userName, $iterate = 0) //userNamme - имя пользователя, iterate - итерация запуска функции
{
    $countQuest = 3; //количество задаваемых вопросов
    $rnd = rand(0, 999); //Получаем случайное чило,
    line("Question: %s", $rnd); //Выводим его на экран
    $answer = prompt("Your answer"); //Запрашиваем ответ
   
    $realAns = ($rnd % 2 === 1) ? "no" : "yes"; //получаем правильный ответ

    if ($realAns === $answer) {//сравниваем полученный ответ, если он верный
        $iterate++; //количество итераций функции увеличиваем на 1
        if ($iterate < $countQuest) {//Количество итераций меньше заданного количества? Играем дальше!
            line("Correct!");
            getNum($userName, $iterate);
        } else { //останавливаем игру
            line("Congratulations, %s!", $userName);
        }
    } else { //ответ неверен! Выводим ошибку
        line("'%s' is wrong answer! ;(. Correct answer was '%s'", $answer, $realAns);
        line("Let's, try again, %s!", $userName);
    }
}
