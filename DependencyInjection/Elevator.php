<?php

declare(strict_types=1);

namespace Patterns\DependencyInjection;

final readonly class Elevator
{
    /**
     * Elevator constructor.
     */
    public function __construct(
        private Rope  $rope,
        private Floor $floor
    )
    {
    }

    public function showMaxStrength(): int
    {
        if ($this->floor->getStrength() < $this->rope->getStrength()) {
            return $this->floor->getStrength();
        }

        return $this->rope->getStrength();
    }

    public function tryCutRope(): string
    {
        return 'Help!';
    }
}
