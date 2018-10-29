<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\PoliceStrategy;

class Murder implements PoliceStrategy
{

    public function getProcedure(): string
    {
        return 'Call for support, pursue.';
    }

    public function getCode(): string
    {
        return '187';
    }
}
