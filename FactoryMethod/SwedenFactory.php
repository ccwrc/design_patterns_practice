<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

use Patterns\FactoryMethod\Accessory\{BenWaBalls, EroticAccessory, Handcuffs, Rope};

final class SwedenFactory extends EroticFactory
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
                $handcuffs = new Handcuffs(100);
                return $handcuffs;
                break;
            case self::FOR_WOMAN:
                $benWaBalls = new BenWaBalls();
                $benWaBalls->setPleasureLevel(300);
                return $benWaBalls;
                break;
            case self::FOR_BI:
                $rope = new Rope(-50);
                return $rope;
                break;
            default:
                throw new \InvalidArgumentException('is not a valid sex');
        }
    }
}
