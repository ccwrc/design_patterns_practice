<?php

declare(strict_types=1);

namespace Patterns\FluentInterface;

class Question
{
    public function __construct(private string $content)
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
