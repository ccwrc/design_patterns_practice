<?php

declare(strict_types=1);

namespace Patterns\tests\unit\FluentInterface;

use Patterns\FluentInterface\{Question, Questionnaire};
use PHPUnit\Framework\TestCase;

class QuestionnaireTest extends TestCase
{
    public function testFillUpQuestionnaire(): void
    {
        $question1 = $this->createMock(Question::class);
        $question2 = $this->createMock(Question::class);
        $question3 = $this->createMock(Question::class);

        $questionnaire = new Questionnaire();
        $questionnaire->addQuestion($question1)
            ->addQuestion($question2)
            ->addQuestion($question3);

        $this->assertCount(3, $questionnaire->getQuestions());
    }
}
