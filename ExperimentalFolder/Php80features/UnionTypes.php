<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php80features;

/**
 * @link https://php.watch/versions/8.0/union-types description
 */
class UnionTypes
{
    public static function get(int|string|array $value): int|string|array
    {
        return $value;
    }
}
