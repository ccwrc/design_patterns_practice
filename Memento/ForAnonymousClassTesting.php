<?php

declare(strict_types=1);

namespace Patterns\Memento;

abstract class ForAnonymousClassTesting
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function someFunction(): void;

    public function returnTrue(): bool
    {
        return true;
    }
}
