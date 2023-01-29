<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

final class Rope implements EroticAccessory, Vandersexxx
{
    private int $pleasureLevel;

    public function __construct(int $pleasureLevel = 0)
    {
        $this->pleasureLevel = $pleasureLevel;
    }

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

    /**
     * @inheritDoc
     */
    public function getSafeWord(): string
    {
        return 'FLÜGGÅƎNKð€CHIŒßØLSÊN';
    }
}
