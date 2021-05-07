<?php

namespace Brain\Games\Games\BrainPrime;

use function Brain\Games\Engine\startGame;

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function run(): callable
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getQuestionAndAnswer = function (): array {
        $num = rand(1, 100);
        $question = $num;
        $answer = isPrime($num) ? 'yes' : 'no';
        return [$question, $answer];
    };

    return fn () => startGame($getQuestionAndAnswer, $description);
}
