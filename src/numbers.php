<?php

namespace BrainGames\numbers;

use function BrainGames\Cli\run;
use function cli\prompt;
use function cli\line;

function start()
{
    $userName = run(); //функция в cli.php, выводит приветствие, возвращает имя, которое ввел пользователь
    print_r("Answer \"yes\" if the number is even, otherwise answer \"no\" \n");
    getNum($userName); //генерирует число, задает вопрос, проверяет ответ
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
