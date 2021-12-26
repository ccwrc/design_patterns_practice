<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class OtherCrime implements CrimeType
{
    private const CODE = 'XXX';
    private const PROCEDURE = 'Recognize, make a note, pass it to the prosecutor\'s office';

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
