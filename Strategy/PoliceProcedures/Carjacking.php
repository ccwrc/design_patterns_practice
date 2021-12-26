<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class Carjacking implements CrimeType
{
    private const CODE = '215';
    private const PROCEDURE = 'Turn on the siren and lights, pursue';

    /**
     * @inheritDoc
     */
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
