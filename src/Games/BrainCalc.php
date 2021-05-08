<?php

namespace Brain\Games\Games\BrainCalc;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ['+', '-', '*'];

function run(): void
{
    $getQuestionAndAnswer = function (): array {
        $operator = OPERATORS[array_rand(OPERATORS)];
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$operator} {$num2}";

        $answer = 0;
        switch ($operator) {
            case '+':
                $answer = $num1 + $num2;
                break;
            case '*':
                $answer = $num1 * $num2;
                break;
            case '-':
                $answer = $num1 - $num2;
                break;
            default:
                $answer = "{$operator} is not supported!";
        }
        return [$question, strval($answer)];
    };

    startGame($getQuestionAndAnswer, DESCRIPTION);
}
