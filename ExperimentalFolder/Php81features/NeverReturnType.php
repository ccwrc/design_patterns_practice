<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php81features;

/**
 * @link https://php.watch/versions/8.1/never-return-type description
 */
class NeverReturnType
{
    public static function throwException(string $exceptionMessage): never
    {
        throw new \DomainException($exceptionMessage);
    }
}
