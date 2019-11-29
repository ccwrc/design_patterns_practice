<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

class NullCoalescingAssignmentOperator
{
    public static function writeSomethingToArrayWhenIndexNotExists(
        array $array,
        string $anyIndexToArray,
        string $something
    ): array
    {
        $array[$anyIndexToArray] ??= $something;

        return $array;
    }
}
