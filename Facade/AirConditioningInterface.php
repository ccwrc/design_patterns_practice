<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface AirConditioningInterface
{
    /**
     * turn on AC - set flag
     * @return bool
     */
    public function turnOnAirConditioning(): bool;

    /**
     * turn off AC - set flag
     */
    public function disableAirConditioning(): void;

    /**
     * @param int $temperature
     */
    public function setTemperature(int $temperature): void;
}
