<?php

namespace Brain\Games\Games\BrainEven;

use function Brain\Games\Engine\startGame;

function isEven($num)
{
    return $num % 2 === 0;
}

function run(): callable
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no"';
    $getQuestionAndAnswer = function (): array {
        $num = rand(1, 100);
        $question = $num;
        $answer = isEven($num) ? 'yes' : 'no';
        return [$question, $answer];
    };

    return fn () => startGame($getQuestionAndAnswer, $description);
}
