<?php

namespace BrainGames\games\numbers;

use function BrainGames\games\start;
use function BrainGames\games\bodyGame;

function run() //Выводит приветствие, спрашивает имя пользователя и возвращает его
{
    //start() получает название игры, возвращает имя пользователя,
    //generateGame() получает количество необходимых вопросов,
    //генерирует вопросы, возвращает ассоциативный массив типа вопрос = ответ
    $explanat = "Answer \"yes\" if the number is even, otherwise answer \"no\" \n";
    bodyGame(start($explanat), generateGame(3)); //3 = количство вопросов, можно задать любое количество
}

function generateGame($countQuest)
{
    for ($i = 1; $i <= $countQuest; $i++) {
        $rnd = rand(0, 999);                        //Получаем случайное чило,
        $realAns = ($rnd % 2 === 1) ? "no" : "yes"; //получаем правильный ответ
        $gameTask[$rnd] = $realAns;
    }
    return $gameTask;
}
