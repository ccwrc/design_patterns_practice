<?php

declare(strict_types=1);

namespace Patterns\Facade;

final class AirConditioning implements AirConditioningInterface
{
    public const MIN_TEMPERATURE = -5;
    public const MAX_TEMPERATURE = 25;
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
        $this->temperature = self::getCorrectTemperature($temperature);
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
        $this->temperature = self::getCorrectTemperature($temperature);
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }

    private static function getCorrectTemperature(int $temperature): int
    {
        if ($temperature < self::MIN_TEMPERATURE) {
            return self::MIN_TEMPERATURE;
        }
        if ($temperature > self::MAX_TEMPERATURE) {
            return self::MAX_TEMPERATURE;
        }
        return $temperature;
    }
}
