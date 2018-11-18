<?php

declare(strict_types=1);

namespace Patterns\Prototype;

final class Sarah implements Location
{
    /**
     * @var bool
     */
    private $willToSurvive;

    /**
     * @var int
     */
    private $location;

    /**
     * @var bool
     */
    private $lives;

    public function __construct(bool $willToSurvive)
    {
        $this->willToSurvive = $willToSurvive;
        $this->location = rand(1,100);
        $this->lives = true;
    }

    public function isWillToSurvive(): bool
    {
        return $this->willToSurvive;
    }

    public function getLocation(): int
    {
        return $this->location;
    }

    public function changeLocation(int $location): void
    {
        $this->location = $location;
    }

    public function isLives(): bool
    {
        return $this->lives;
    }

    /**
     * @param Location $location
     * @return bool
     */
    public function killSarah(Location $location): bool
    {
        if ($location->getLocation() === $this->location) {
            $this->lives = false;
            return true;
        }
        return false;
    }
}
