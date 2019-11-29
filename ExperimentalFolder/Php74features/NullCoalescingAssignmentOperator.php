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
        // $plainArray['key'] = isset($plainArray['key']) ? $plainArray['key'] : 'default'; // very old way
        // $plainArray['key'] = $plainArray['key'] ?? 'default'; // old way
        $array[$anyIndexToArray] ??= $something;

        return $array;
    }
}
