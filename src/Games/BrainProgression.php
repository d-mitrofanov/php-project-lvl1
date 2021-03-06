<?php

namespace Brain\Games\Games\BrainProgression;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = "What number is missing in the progression?";

function run(): void
{
    $getQuestionAndAnswer = function (): array {
        $firstNum = rand(1, 100);
        $progressionLength = rand(5, 11);
        $progressionJump = rand(1, 20);
        $indexToHide = rand(0, $progressionLength - 1);
        $progression = [$firstNum];

        for ($i = 0; $i < $progressionLength; $i++) {
            $lastItem = $progression[count($progression) - 1];
            $progression[] = $lastItem + $progressionJump;
        }
        $answer = $progression[$indexToHide];
        $progression[$indexToHide] = "..";
        $question = implode(" ", $progression);

        return [$question, strval($answer)];
    };

    startGame($getQuestionAndAnswer, DESCRIPTION);
}
