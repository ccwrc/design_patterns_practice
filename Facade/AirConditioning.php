<?php

declare(strict_types=1);

namespace Patterns\Facade;

final class AirConditioning implements AirConditioningInterface
{
    /**
     * @var bool
     */
    private $isWorking;
    /**
     * @var int
     */
    private $temperature;

    public function __construct(int $temperature)
    {
        $this->isWorking = false;
        $this->temperature = $temperature;
    }

    /**
     * turn on AC - set flag
     * @return bool
     */
    public function turnOnAirConditioning(): bool
    {
        $this->isWorking = true;

        return $this->isWorking;
    }

    /**
     * turn off AC - set flag
     */
    public function disableAirConditioning(): void
    {
        $this->isWorking = false;
    }

    /**
     * @param int $temperature
     */
    public function setTemperature(int $temperature): void
    {
        if ($temperature < -5) {
            $this->temperature = -5;
            return;
        }
        if ($temperature > 25) {
            $this->temperature = 25;
            return;
        }
        $this->temperature = $temperature;
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }
}
