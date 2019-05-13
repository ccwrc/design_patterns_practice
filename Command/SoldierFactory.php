<?php

declare(strict_types=1);

namespace Patterns\Command;

final class SoldierFactory
{
    public const CALORIES_TO_FILL_UP = 1500;

    public static function createSoldier(): Soldier
    {
        return new Soldier('Private', 'anonymous');
    }

    public static function createFillUpSoldier(): Soldier
    {
        $soldier = new Soldier('Private', 'anonymous');
        $soldier->eatForGloryOfCountry(self::CALORIES_TO_FILL_UP);

        return $soldier;
    }
}
