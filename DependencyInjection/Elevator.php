<?php

declare(strict_types=1);

namespace Patterns\DependencyInjection;

final class Elevator
{
    private Rope $rope;

    private Floor $floor;

    /**
     * Elevator constructor.
     *
     * @param Rope $rope
     * @param Floor $floor
     */
    public function __construct(
        Rope  $rope,
        Floor $floor
    )
    {
        $this->rope = $rope;
        $this->floor = $floor;
    }

    /**
     * @return int
     */
    public function showMaxStrength(): int
    {
        if ($this->floor->getStrength() < $this->rope->getStrength()) {
            return $this->floor->getStrength();
        }

        return $this->rope->getStrength();
    }

    /**
     * @return string
     */
    public function tryCutRope(): string
    {
        return 'Help!';
    }
}
