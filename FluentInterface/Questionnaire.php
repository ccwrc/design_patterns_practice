<?php

declare(strict_types=1);

namespace Patterns\FluentInterface;

/**
 * Fluent Interface implementation.
 */
final class Questionnaire
{
    private string $title;

    /**
     * @var Question[]
     */
    private array $questions = [];

    /**
     * Method allows chaining.
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method allows chaining.
     */
    public function addQuestion(Question $question): self
    {
        $this->questions[] = $question;

        return $this;
    }

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
