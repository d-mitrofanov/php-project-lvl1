<?php

namespace Brain\Games\Games\BrainEven;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function run(): void
{
    $getQuestionAndAnswer = function (): array {
        $num = rand(1, 100);
        $question = $num;
        $answer = isEven($num) ? 'yes' : 'no';
        return [$question, $answer];
    };

    startGame($getQuestionAndAnswer, DESCRIPTION);
}
