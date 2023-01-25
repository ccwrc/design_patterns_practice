<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

use Patterns\FactoryMethod\Accessory\{BenWaBalls, EroticAccessory, Handcuffs, Rope};

final class SwedenFactory extends EroticFactory
{
    /**
     * @inheritDoc
     */
    public static function createEroticAccessoryFor(string $sex): EroticAccessory
    {
        switch ($sex) {
            case self::FOR_MAN:
                return new Handcuffs(self::PLEASURE_LEVEL_100);
            case self::FOR_WOMAN:
                $benWaBalls = new BenWaBalls();
                $benWaBalls->setPleasureLevel(self::PLEASURE_LEVEL_300);

                return $benWaBalls;
            case self::FOR_BI:
                return new Rope(self::PLEASURE_LEVEL_MINUS_50);
            default:
                throw new \InvalidArgumentException('is not a valid sex');
        }
    }
}
