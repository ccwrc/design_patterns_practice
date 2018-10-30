<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class Carjacking implements CrimeType
{
    public function getProcedure(): string
    {
        return 'Turn on the siren and lights, pursue';
    }

    public function getCode(): string
    {
        return '215';
    }
}
