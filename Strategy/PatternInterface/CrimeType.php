<?php

declare(strict_types=1);

namespace Patterns\Strategy\PatternInterface;

interface CrimeType
{
    public function getProcedure(): string;

    /**
     * @link https://en.wikipedia.org/wiki/Police_code
     * @return string
     */
    public function getCode(): string;
}
