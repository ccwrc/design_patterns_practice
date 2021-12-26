<?php

declare(strict_types=1);

namespace Patterns\Memento;

abstract class ForAnonymousClassTesting
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function someFunction(): void;

    public function returnTrue(): bool
    {
        return true;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
