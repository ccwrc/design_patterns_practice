<?php

declare(strict_types=1);

namespace Patterns\Facade;

final class TvSet implements TvSetInterface
{
    public function turnOn(): string
    {
        return 'tv turned on';
    }

    public function disable(): string
    {
        return 'off...';
    }

    /**
     * @link https://damian.dziaduch.pl/2018/12/17/wpis-php-7-3-niescislosci/#more-441 instanceof fatal error in PHP <7.2
     * @param mixed $mary
     * @return bool
     */
    public static function isMaryAnTvSetObject($mary): bool
    {
        return $mary instanceof TvSet;
    }
}
