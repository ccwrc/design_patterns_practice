<?php

declare(strict_types=1);

namespace Patterns\LazyLoading;

abstract class BallOfMud
{
    public function __construct(public int $weight)
    {
    }

    public function throwMud(): int
    {
        return $this->weight;
    }
}
