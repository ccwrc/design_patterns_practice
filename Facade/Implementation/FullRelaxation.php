<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

use Patterns\Facade\{AirConditioningInterface, InternetInterface, TvSetInterface};

final readonly class FullRelaxation implements RelaxInterface
{
    public function __construct(
        private AirConditioningInterface $airConditioning,
        private InternetInterface        $internet,
        private TvSetInterface           $tvSet
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function makeItHappen(int $temperature): void
    {
        $this->airConditioning->setTemperature($temperature);
        $this->airConditioning->turnOnAirConditioning();
        $this->internet->connect();
        $this->tvSet->turnOn();
    }
}
