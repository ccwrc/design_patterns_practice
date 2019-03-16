<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

use Patterns\Facade\{AirConditioning, Internet, TvSet};

final class FullRelaxationEncore implements RelaxInterface
{
    private const DEFAULT_TEMPERATURE = 20;
    /**
     * @var AirConditioning
     */
    private $airConditioning;
    /**
     * @var Internet
     */
    private $internet;
    /**
     * @var TvSet
     */
    private $tvSet;

    public function __construct()
    {
        $this->airConditioning = new AirConditioning(self::DEFAULT_TEMPERATURE);
        $this->internet = new Internet();
        $this->tvSet = new TvSet();
    }

    /**
     * Steps: set AirConditioning temperature, turn on AirConditioning, connect to Internet, turn on TvSet.
     * @param int $temperature
     */
    public function makeItHappen(int $temperature): void
    {
        $this->airConditioning->setTemperature($temperature);
        $this->airConditioning->turnOnAirConditioning();
        $this->internet->connect();
        $this->tvSet->turnOn();
    }

    public function hasItHappened(): bool
    {
        if ($this->airConditioning->getTemperature() === self::DEFAULT_TEMPERATURE
            && $this->internet->isOnline() === true
            && $this->tvSet->isTurnedOn() === true) {
            return true;
        }
        return false;
    }
}
