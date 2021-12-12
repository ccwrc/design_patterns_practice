<?php

declare(strict_types=1);

namespace Patterns\DependencyInjection;

final class Floor
{
    private int $strength;

    /**
     * Floor constructor.
     *
     * @param int $strength
     */
    public function __construct(int $strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }
}
