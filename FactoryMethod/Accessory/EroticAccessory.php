<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

interface EroticAccessory
{
    /**
     * @param int $pleasureLevel negative values for masochists
     */
    public function setPleasureLevel(int $pleasureLevel): void;

    public function getPleasureLevel(): int;
}
