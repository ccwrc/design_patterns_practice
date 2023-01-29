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
        return match ($sex) {
            self::FOR_MAN => new Rope(),
            self::FOR_WOMAN => new VintageDildo(),
            self::FOR_BI => new Handcuffs(),
            default => throw new \InvalidArgumentException('is not a valid sex'),
        };
    }
}
