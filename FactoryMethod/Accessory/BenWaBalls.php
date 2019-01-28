<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

class BenWaBalls implements EroticAccessory
{
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
}
