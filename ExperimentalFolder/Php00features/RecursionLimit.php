<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php00features;

class RecursionLimit
{
    public static function countDownToZeroFrom(int $number): int
    {
        $almostZero = abs($number) - 1;

        if (0 >= $almostZero) {
            return $almostZero;
        }

        return self::countDownToZeroFrom($almostZero);
    }
}
