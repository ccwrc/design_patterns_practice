<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

use Patterns\FactoryMethod\Accessory\{EroticAccessory, Handcuffs, Rope, VintageDildo};

final class ChinaFactory extends EroticFactory
{
    /**
     * @inheritDoc
     */
    public static function createEroticAccessoryFor(string $sex): EroticAccessory
    {
        switch ($sex) {
            case self::FOR_MAN:
                return new Rope();
            case self::FOR_WOMAN:
                return new VintageDildo();
            case self::FOR_BI:
                return new Handcuffs();
            default:
                throw new \InvalidArgumentException('is not a valid sex');
        }
    }
}
