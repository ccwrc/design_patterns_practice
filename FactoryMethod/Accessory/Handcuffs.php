<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

final class Handcuffs implements EroticAccessory
{
    /**
     * @var int
     */
    private $pleasureLevel;

    public function __construct(int $pleasureLevel = 0)
    {
        $this->pleasureLevel = $pleasureLevel;
    }

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
}
