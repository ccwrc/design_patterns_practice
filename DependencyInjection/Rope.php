<?php

declare(strict_types=1);

namespace Patterns\DependencyInjection;

final readonly class Rope
{
    /**
     * Rope constructor.
     */
    public function __construct(
        private int $strength,
        private int $length
    )
    {
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getLength(): int
    {
        return $this->length;
    }
}
