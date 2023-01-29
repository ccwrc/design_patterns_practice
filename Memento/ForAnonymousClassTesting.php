<?php

declare(strict_types=1);

namespace Patterns\Memento;

abstract class ForAnonymousClassTesting
{
    public function __construct(private string $name)
    {
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
