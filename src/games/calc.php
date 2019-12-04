<?php

namespace BrainGames\games\calc;

use function BrainGames\games\start;
use function BrainGames\games\bodyGame;

function run() //Выводит приветствие, спрашивает имя пользователя и возвращает его
{
    //start() получает название игры, возвращает имя пользователя,
    //generateGame() получает количество необходимых вопросов,
    //генерирует вопросы, возвращает ассоциативный массив типа вопрос = ответ
    $explanat = "What is the result of the expression? \n";
    bodyGame(start($explanat), generateGame(3)); //3 = количство вопросов, можно задать любое количество
}

//Получим задание на игру!
function generateGame($countQuest)
{
    $operArr = ['+', '-', '*']; //Возможные операции
    for ($i = 1; $i <= $countQuest; $i++) { //сформируем вопрос/ответ для каждой итерации игры!
        $firstNum = rand(0, 99); //Генерируем первое число
        $secondNum = rand(0, 9); //Генерируем второе число
        $operate = $operArr[rand(0, 2)]; //Случайный выбор операции
        //Вычислим правильный ответ
        switch ($operate) {
            case '+':
                $res = $firstNum + $secondNum;
                break;
            case '-':
                $res = $firstNum - $secondNum;
                break;
            case '*':
                $res = $firstNum * $secondNum;
                break;
        }
        //запишем в массив вопрос/ответ
        $gameTask["{$firstNum} $operate {$secondNum}"] = $res;
    }
    return $gameTask;
}
