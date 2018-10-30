<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class IndecentExposure implements CrimeType
{
    public function getProcedure(): string
    {
        return 'Prepare a blanket, catch a suspect, cover with a blanket.';
    }

    public function getCode(): string
    {
        return '314';
    }
}
