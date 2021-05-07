<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function startGame(callable $getQuestionAndAnswer, string $description): void
{
    $numOfRounds = 3;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($description);

    for ($i = 0; $i < $numOfRounds; $i++) {
        [$question, $answer] = $getQuestionAndAnswer();
        line("Question: %s", $question);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer === $answer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
