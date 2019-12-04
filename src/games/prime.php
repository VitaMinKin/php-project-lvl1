<?php

namespace BrainGames\games\prime;

use function BrainGames\games\start;
use function BrainGames\games\bodyGame;

function run()
{
    $explanat = "Answer \"yes\" if given number is prime. Otherwise answer \"no\". \n";
    bodyGame(start($explanat), generateGame(3)); //3 = количство вопросов
}

function generateGame($countQuest)
{
    for ($i = 1; $i <= $countQuest; $i++) {
        $a = rand(0, 99);
        $gameTask[$a] = prime($a);
    }
    return $gameTask;
}

function prime($a)
{
    if ($a % 2 == 0) {
        return "no";
    }

    $d = 3; //Для перебора только нечетных чисел

    while (($d * $d <= $a) and ($a % $d != 0)) {
        $d += 2;
    }
           
    return  (($d * $d) > $a) ? "yes" : "no";
}
