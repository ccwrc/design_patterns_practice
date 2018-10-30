<?php

declare(strict_types=1);

namespace Patterns\Strategy\PoliceProcedures;

use Patterns\Strategy\PatternInterface\CrimeType;

final class Kidnapping implements CrimeType
{
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $procedure;

    public function __construct()
    {
        $this->code = '207';
        $this->procedure = 'Call for support, pursue, keep informed about the location.';
    }

    public function getProcedure(): string
    {
        return $this->procedure;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getCodeAndProcedure(): string
    {
        return "Code {$this->code}: {$this->procedure}";
    }

    public function changeCode(string $newCode): void
    {
        $this->code = $newCode;
    }

    public function addNoteToProcedure(string $note): void
    {
        $this->procedure .= ' Note: ' . $note;
    }
}
