<?php

declare(strict_types=1);

namespace Patterns\FluentInterface;

/**
 * Fluent Interface implementation.
 */
final class Questionnaire
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var Question[]
     */
    private $questions = [];

    /**
     * Function allows chaining.
     * @param string $title
     * @return Questionnaire
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Function allows chaining.
     * @param Question $question
     * @return Questionnaire
     */
    public function addQuestion(Question $question): self
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return Question[]
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }
}
