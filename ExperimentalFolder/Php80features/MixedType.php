<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php80features;

/**
 * @link https://php.watch/versions/8.0/mixed-type description
 */
class MixedType
{
    /**
     * mixed is equivalent to a Union Type of: string|int|float|bool|null|array|object|callable|resource
     *
     * @param mixed $value
     *
     * @return string
     */
    public static function getType(mixed $value): string
    {
        return gettype($value);
    }
}