<?php

namespace BrainGames\games;

use function BrainGames\cli\run;
use function cli\line;
use function cli\prompt;

function start($game)
{
    $userName = run($game); //функция в cli.php, выводит приветствие, возвращает имя, которое ввел пользователь
    return ($userName); //Возвращаем имя пользователя
}

function bodyGame($userName, $task = []) //userNamme - имя пользователя, iterate - итерация запуска функции
{
    foreach ($task as $key => $val) {
        //массив $task содержит "вопрос" => "ответ";
        line("Question: %s", $key); //Выводим вопрос на экран
        $answer = prompt("Your answer"); //Запрашиваем ответ от пользователя
        if ($val == $answer) {//сравниваем полученный ответ, если он верный, продолжаем игру до конца массива
                line("Correct!");
        } else { //ответ неверен! Выводим ошибку и останавливаем игру
            line("'%s' is wrong answer! ;(. Correct answer was '%s'", $answer, $val);
            line("Let's, try again, %s!", $userName);
            exit();
        }
    }
    line("Congratulations, %s!", $userName);
}
