<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

use Patterns\FactoryMethod\Accessory\EroticAccessory;

abstract class EroticFactory
{
    public const FOR_MAN = 'man';
    public const FOR_WOMAN = 'woman';
    public const FOR_BI = 'who cares';

    /**
     * @param string $sex
     *
     * @throws \InvalidArgumentException
     * @return EroticAccessory
     */
    abstract public static function createEroticAccessoryFor(string $sex): EroticAccessory;
}
