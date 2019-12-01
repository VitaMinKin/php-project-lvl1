<?php

namespace BrainGames\games\calc;

use function BrainGames\games\start;

function run() //Выводит приветствие, спрашивает имя пользователя и возвращает его
{
    startGame(start('brainCalc')); //запускает игру, передавая функции имя пользователя
}

function startGame($user)
{
    print_r("Ha-ha-ha {$user}, you in the game! \n");
    calc();
}

//Получим задание на игру!
function calc()
{
    $operArr = ['+', '-', '*']; //Возможные операции
    $firstNum = rand(0, 99); //Первое число
    $secondNum = rand(0, 99); //Второе число
    $operate = $operArr[rand(0,2)]; //Случайный выбор операции
    
    $gameTask = ["{$firstNum} $operate {$secondNum} \n"];
   
    switch ($operate)
    {
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
    $gameTask[] = $res;
    return $gameTask;
}
