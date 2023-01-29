<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class Murder implements CrimeType
{
    private string $code;

    private string $procedure;

    public function __construct()
    {
        $this->code = '187';
        $this->procedure = 'Call for support, pursue.';
    }

    public function getProcedure(): string
    {
        return $this->procedure;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return $this->code;
    }

    public function getCodeAndProcedure(): string
    {
        return "Code {$this->code}: {$this->procedure}";
    }
}
