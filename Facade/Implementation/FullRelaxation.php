<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

use Patterns\Facade\{AirConditioningInterface, InternetInterface, TvSetInterface};

final class FullRelaxation implements RelaxInterface
{
    private AirConditioningInterface $airConditioning;

    private InternetInterface $internet;

    private TvSetInterface $tvSet;

    public function __construct(
        AirConditioningInterface $airConditioning,
        InternetInterface $internet,
        TvSetInterface $tvSet
    ) {
        $this->airConditioning = $airConditioning;
        $this->internet = $internet;
        $this->tvSet = $tvSet;
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
