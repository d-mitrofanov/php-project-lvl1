<?php

namespace Brain\Games\Games\BrainGCD;

use function Brain\Games\Engine\startGame;

function getGCD(int $a, int $b): int
{
    while ($b !== 0) {
        $m = $a % $b;
        $a = $b;
        $b = $m;
    }
    return $a;
}

function run(): callable
{
    $description = "Find the greatest common divisor of given numbers.";
    $getQuestionAndAnswer = function (): array {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$num2}";
        $answer = getGCD($num1, $num2);
        return [$question, strval($answer)];
    };

    return fn () => startGame($getQuestionAndAnswer, $description);
}
