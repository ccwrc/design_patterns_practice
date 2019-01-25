<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod;

interface EroticAccessory
{
    /**
     * @param int $pleasureLevel negative values for masochists
     */
    public function setPleasureLevel(int $pleasureLevel): void;

    /**
     * @return int
     */
    public function getPleasureLevel(): int;
}
