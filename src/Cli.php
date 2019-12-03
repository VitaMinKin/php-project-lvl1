<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run($hello = '')
{
    line('Welcome to the Brain Games!');
    if ($hello != '') {
        line($hello);
    }
    $name = prompt('May i have your name?');
    line("Hello, %s! \n", $name);
    return $name;
}
