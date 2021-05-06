<?php

namespace Brain\Games\BrainEven;

use function cli\line;
use function cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}

function run($name)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $count = 0;

    while ($count < 3) {
        $num = rand(1, 100);
        line("Question: %d", $num);
        $userAnswer = prompt("Your answer");
        $correctAnswer = isEven($num) ? 'yes' : 'no';

        if ((isEven($num) && $userAnswer === 'yes') || (!isEven($num) && $userAnswer === "no")) {
            line("Correct!");
            $count++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    if ($count === 3) {
        line("Congratulations, %s", $name);
    }
}
