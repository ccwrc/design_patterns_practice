<?php

declare(strict_types=1);

namespace Patterns\FactoryMethod\Accessory;

final class Rope implements EroticAccessory, Vandersexxx
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

    /**
     * @link https://www.youtube.com/watch?v=wowuE8m0JhU club vandersexxx (free t-shirt)
     * @return string
     */
    public function getSafeWord(): string
    {
        return 'FLÜGGÅƎNKð€CHIŒßØLSÊN';
    }
}
