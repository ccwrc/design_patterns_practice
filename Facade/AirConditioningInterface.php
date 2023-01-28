<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface AirConditioningInterface
{
    /**
     * Turn on AC - set flag.
     */
    public function turnOnAirConditioning(): bool;

    /**
     * Turn off AC - set flag.
     */
    public function disableAirConditioning(): void;

    public function setTemperature(int $temperature): void;

    public function getTemperature(): int;
}
