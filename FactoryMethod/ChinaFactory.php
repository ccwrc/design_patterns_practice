<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

use Patterns\FactoryMethod\Accessory\{EroticAccessory, Handcuffs, Rope, VintageDildo};

final class ChinaFactory extends EroticFactory
{
    /**
     * @param string $sex
     * @throws \InvalidArgumentException
     * @return EroticAccessory
     */
    public static function createEroticAccessoryFor(string $sex): EroticAccessory
    {
        switch ($sex) {
            case self::FOR_MAN:
                return new Rope();
                break;
            case self::FOR_WOMAN:
                return new VintageDildo();
                break;
            case self::FOR_BI:
                return new Handcuffs();
                break;
            default:
                throw new \InvalidArgumentException('is not a valid sex');
        }
    }
}
