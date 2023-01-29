<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class IndecentExposure implements CrimeType
{
    private const CODE = '314';
    private const PROCEDURE = 'Prepare a blanket, catch a suspect, cover with a blanket';

    public function getProcedure(): string
    {
        return self::PROCEDURE;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return self::CODE;
    }
}
