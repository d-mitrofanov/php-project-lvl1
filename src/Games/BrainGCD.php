<?php

namespace Brain\Games\Games\BrainGCD;

use function Brain\Games\Engine\startGame;

function run()
{
    $description = "Find the greatest common divisor of given numbers.";
    $getQuestionAndAnswer = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$num2}";
        $answer = gmp_gcd($num1, $num2);
        return [$question, strval($answer)];
    };

    return startGame($getQuestionAndAnswer, $description);
}
