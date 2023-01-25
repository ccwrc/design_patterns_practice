<?php

declare(strict_types=1);

namespace Patterns\LazyLoading;

interface BigBallOfMudInterface
{
    public const MIN_WEIGHT = 10;

    public function get(int $weight = self::MIN_WEIGHT): BallOfMud;
}
