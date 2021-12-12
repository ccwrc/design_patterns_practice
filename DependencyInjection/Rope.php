<?php

declare(strict_types=1);

namespace Patterns\DependencyInjection;

final class Rope
{
    private int $strength;

    private int $length;

    /**
     * Rope constructor.
     *
     * @param int $strength
     * @param int $length
     */
    public function __construct(
        int $strength,
        int $length
    )
    {
        $this->strength = $strength;
        $this->length = $length;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }
}
