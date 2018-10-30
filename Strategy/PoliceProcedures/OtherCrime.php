<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

class OtherCrime implements CrimeType
{

    public function getProcedure(): string
    {
        return 'Recognize, make a note, pass it to the prosecutor\'s office';
    }

    public function getCode(): string
    {
        return 'XXX';
    }
}
