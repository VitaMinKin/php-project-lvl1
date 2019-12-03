<?php

namespace BrainGames\games\gcd;

use function BrainGames\games\start;
use function BrainGames\games\bodyGame;

function run() //Выводит приветствие, спрашивает имя пользователя и возвращает его
{
    /*
     bodyGame($userName, $task)- движок игры, реализована в games.php
        $userName - имя пользователя
        $task - задание на игру в виде ассоциативного массива
     start($WhatsGame):string - реализует начало игры, возвращает имя пользователя (games.php)
        $WhatsGame - название игры, выводимое после запуска
     generateGame($countQuest):array - генерирует вопросы, возвращает ассоциативный массив типа вопрос = ответ
        $countQuest - количество необходимых вопросов,
    */
    $explanat = "Find the greatest common divisor of given numbers. \n";
    bodyGame(start($explanat), generateGame(3)); //3 = количство вопросов
}

function generateGame($countQuest)
{
    for ($i = 1; $i <= $countQuest; $i++) {
         //Получаем первое случайное чило
        do {    //Для усложнения задачи, выбираем только четные числа!
            $firstNum = rand(0, 99);
        } while ($firstNum % 2 === 1);

        //Получаем второе случайное чило
        do {
            $secondNum = rand(0, 99);
        } while ($secondNum % 2 === 1);

        $realAns = nod($firstNum, $secondNum);
        $gameTask["{$firstNum} {$secondNum}"] = $realAns;
    }
    return $gameTask;
}

//Бинарный алгоритм вычисления НОД
function nod($a, $b)
{
    $k = 1;
    while (($a != 0) && ($b != 0)) {
        while (($a % 2 === 0) && ($b % 2 === 0)) {
            $a /= 2;
            $b /= 2;
            $k *= 2;
        }
        while ($a % 2 === 0) {
            $a /= 2;
        }
            
        while ($b % 2 === 0) {
            $b /= 2;
        }

        if ($a >= $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $b * $k;
}
