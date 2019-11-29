<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://wiki.php.net/rfc/null_coalesce_equal_operator docs
 */
final class NullCoalescingAssignmentOperator
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
