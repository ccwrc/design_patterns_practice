<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://wiki.php.net/rfc/spread_operator_for_array docs
 */
final class ArraySpreadOperator
{
    /**
     * Much faster than array_merge().
     * Note: to PHP 8.0 only works with arrays with numerical keys. Works fine from PHP 8.1
     */
    public static function glueThreeArrays(
        array $array1,
        array $array2,
        array $array3
    ): array
    {
        return [...$array1, ...$array2, ...$array3];
    }

    public static function glueThreeArraysOldWay(
        array $array1,
        array $array2,
        array $array3
    ): array
    {
        return \array_merge($array1, $array2, $array3);
    }
}
