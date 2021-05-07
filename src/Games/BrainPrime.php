<?php

namespace Brain\Games\Games\BrainPrime;

use function Brain\Games\Engine\startGame;

function isPrime($num)
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

function run()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getQuestionAndAnswer = function () {
        $num = rand(1, 100);
        $question = $num;
        $answer = isPrime($num) ? 'yes' : 'no';
        return [$question, $answer];
    };

    return startGame($getQuestionAndAnswer, $description);
}
