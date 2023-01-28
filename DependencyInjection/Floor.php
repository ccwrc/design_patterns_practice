<?php

declare(strict_types=1);

namespace Patterns\DependencyInjection;

final readonly class Floor
{
    /**
     * Floor constructor.
     */
    public function __construct(private int $strength)
    {
    }

    public function getStrength(): int
    {
        return $this->strength;
    }
}
