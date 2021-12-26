<?php

declare(strict_types=1);

namespace Patterns\FluentInterface;

class Question
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
