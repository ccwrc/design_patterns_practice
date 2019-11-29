<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

class NullCoalescingAssignmentOperator
{
    public static function writeSomethingToArrayWhenIndexNotExists(
        array $array,
        string $index,
        string $something
    ): array
    {
        $array[$index] ??= $something;

        return $array;
    }
}
