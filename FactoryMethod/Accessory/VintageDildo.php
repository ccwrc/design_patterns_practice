<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

final class VintageDildo implements EroticAccessory
{
    /**
     * @var int
     */
    private $size = 6;
    /**
     * @var int
     */
    private $pleasureLevel = 0;

    /**
     * @param int $pleasureLevel negative values for masochists
     */
    public function setPleasureLevel(int $pleasureLevel): void
    {
        $this->pleasureLevel = $pleasureLevel;
    }

    /**
     * @return int
     */
    public function getPleasureLevel(): int
    {
        return $this->pleasureLevel;
    }

    /**
     * @param int $size
     * @return string
     */
    public function changeSize(int $size): string
    {
        $this->size = abs($size);

        return 'set new pleasure level';
    }
}
