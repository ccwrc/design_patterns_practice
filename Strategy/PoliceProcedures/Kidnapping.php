<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\PoliceStrategy;

class Kidnapping implements PoliceStrategy
{
    public function getProcedure(): string
    {
        return 'Call for support, pursue, keep informed about the location.';
    }

    public function getCode(): string
    {
        return '207';
    }
}
