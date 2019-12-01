<?php

namespace BrainGames\games;

use function BrainGames\cli\run;

function start($game)
{
    $games = array(
        'brainEven' => "Answer \"yes\" if the number is even, otherwise answer \"no\" \n",
        'brainCalc' => "What is the result of the expression? \n"
    );

    $userName = run($games[$game]); //функция в cli.php, выводит приветствие, возвращает имя, которое ввел пользователь
    
    return ($userName); //Возвращаем имя пользователя
}

function bodyGame($userName, $iterate = 0) //userNamme - имя пользователя, iterate - итерация запуска функции
{
    $countQuest = 3; //количество задаваемых вопросов
    /**** КОНКРЕТНАЯ ИГРА**/
    $rnd = rand(0, 999); //Получаем случайное чило,
    /////
    
    line("Question: %s", $rnd); //Выводим его на экран
    $answer = prompt("Your answer"); //Запрашиваем ответ
   
    /***КОНКРЕТНАЯ ИГРА */
    $realAns = ($rnd % 2 === 1) ? "no" : "yes"; //получаем правильный ответ
    //////////////

    if ($realAns === $answer) {//сравниваем полученный ответ, если он верный
        $iterate++; //количество итераций функции увеличиваем на 1
        if ($iterate < $countQuest) {//Количество итераций меньше заданного количества? Играем дальше!
            line("Correct!");
            bodyGame($userName, $iterate);
        } else { //останавливаем игру
            line("Congratulations, %s!", $userName);
        }
    } else { //ответ неверен! Выводим ошибку
        line("'%s' is wrong answer! ;(. Correct answer was '%s'", $answer, $realAns);
        line("Let's, try again, %s!", $userName);
    }
}
