<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

final class VintageDildo implements EroticAccessory
{
    private int $size = 6; /** @phpstan-ignore-line */

    private int $pleasureLevel = 0;

    /**
     * @inheritDoc
     */
    public function setPleasureLevel(int $pleasureLevel): void
    {
        $this->pleasureLevel = $pleasureLevel;
    }

    public function getPleasureLevel(): int
    {
        return $this->pleasureLevel;
    }

    public function changeSize(int $size): string
    {
        $this->size = \abs($size);

        return 'set new pleasure level';
    }
}
