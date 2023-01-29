<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

use Patterns\FactoryMethod\Accessory\EroticAccessory;

abstract class EroticFactory
{
    public const PLEASURE_LEVEL_100 = 100;
    public const PLEASURE_LEVEL_300 = 300;
    public const PLEASURE_LEVEL_MINUS_50 = -50;

    public const FOR_MAN = 'man';
    public const FOR_WOMAN = 'woman';
    public const FOR_BI = 'who cares';

    /**
     * @param string $sex I suggest using constants
     *
     * @throws \InvalidArgumentException
     * @return EroticAccessory
     */
    abstract public static function createEroticAccessoryFor(string $sex): EroticAccessory;
}
