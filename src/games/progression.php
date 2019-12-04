<?php

namespace BrainGames\games\progression;

use function BrainGames\games\start;
use function BrainGames\games\bodyGame;

function run()
{
    $explanat = "What number is missing in the progression? \n";
    bodyGame(start($explanat), generateGame(3)); //3 = количство вопросов
}

function generateGame($countQuest)
{
    for ($i = 1; $i <= $countQuest; $i++) {
        $a1 = rand(0, 99);                              //выберем начало прогрессии
        $d = rand(2, 9);                                //выберем разность прогрессии
        $progression = getProgression($a1, $d, 10);     //получаем прогрессию
        $rnd = rand(0, count($progression));            //выбираем случайное чило
        $tmp = $progression[$rnd];                      //запоминаем значение элемента по выбранному индексу
        $progression[$rnd] = '..';                      //скрываем его
        $str = implode(" ", $progression);              //преобразуем массив к строке
        $gameTask[$str] = $tmp;                         //сформируем вопрос/ответ
    }
    return $gameTask;
}

//$a1 - начало прогрессии, $d - разность прогрессии, $count - количество элементов
function getProgression($a1, $d, $count = 10)
{
    $progres = [$a1];
    for ($i = 1; $i <= $count - 1; $i++) {
        $progres[] = $progres[$i - 1] + $d;
    }
    return $progres;
}
