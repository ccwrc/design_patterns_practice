<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\Traits\CityTrait;

/**
 * @link https://php.watch/versions/8.2/constants-in-traits description
 */
final class ConstantFromTrait
{
    use CityTrait;

    public static function isWaterPresent(): bool
    {
        return self::WATER_PRESENCE;
    }
}
