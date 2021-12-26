<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

final class BenWaBalls implements EroticAccessory
{
    private int $pleasureLevel = 0;

    /**
     * @inheritDoc
     */
    public function setPleasureLevel(int $pleasureLevel): void
    {
        $this->pleasureLevel = $pleasureLevel;
    }

    /**
     * @inheritDoc
     */
    public function getPleasureLevel(): int
    {
        return $this->pleasureLevel;
    }
}
