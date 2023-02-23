<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php80features;

/**
 * @link https://php.watch/versions/8.0/named-parameters info.
 */
class NamedParameters
{
    public const NUMBER_TO_OPEN_HEAVEN = 2;

    public static function willYouGoToHeaven(
        bool   $areYouDead,
        array  $goodDeeds,
        string $defaultValue1 = 'birth-sin',
        string $defaultValue2 = 'test'
    ): bool
    {
        if (!$areYouDead) {
            return false;
        }

        if (self::NUMBER_TO_OPEN_HEAVEN >= count($goodDeeds)) {
            return true;
        }

        return false;
    }
}
