<?php

declare(strict_types=1);

namespace Patterns\Facade;

final class AirConditioning implements AirConditioningInterface
{
    public const MIN_TEMPERATURE = -5;
    public const MAX_TEMPERATURE = 25;

    private bool $isWorking;

    private int $temperature;

    public function __construct(int $temperature)
    {
        $this->isWorking = false;
        $this->temperature = self::getCorrectTemperature($temperature);
    }

    /**
     * @inheritDoc
     */
    public function turnOnAirConditioning(): bool
    {
        $this->isWorking = true;

        return $this->isWorking;
    }

    /**
     * @inheritDoc
     */
    public function disableAirConditioning(): void
    {
        $this->isWorking = false;
    }

    /**
     * @inheritDoc
     */
    public function setTemperature(int $temperature): void
    {
        $this->temperature = self::getCorrectTemperature($temperature);
    }

    /**
     * @inheritDoc
     */
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
