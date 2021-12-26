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
                return new Handcuffs(100);
            case self::FOR_WOMAN:
                $benWaBalls = new BenWaBalls();
                $benWaBalls->setPleasureLevel(300);

                return $benWaBalls;
            case self::FOR_BI:
                return new Rope(-50);
            default:
                throw new \InvalidArgumentException('is not a valid sex');
        }
    }
}
