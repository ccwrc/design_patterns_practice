<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

use Patterns\Facade\{AirConditioningInterface, InternetInterface, TvSetInterface};

class FullRelaxation implements RelaxInterface
{
    /**
     * @var AirConditioningInterface
     */
    private $airConditioning;
    /**
     * @var InternetInterface
     */
    private $internet;
    /**
     * @var TvSetInterface
     */
    private $tvSet;

    public function __construct(
        AirConditioningInterface $airConditioning,
        InternetInterface $internet,
        TvSetInterface $tvSet
    ) {
        $this->airConditioning = $airConditioning;
        $this->internet = $internet;
        $this->tvSet = $tvSet;
    }

    public function makeItHappen(int $temperature): void
    {
        $this->airConditioning->setTemperature($temperature);
        $this->airConditioning->turnOnAirConditioning();
        $this->internet->connect();
        $this->tvSet->turnOnTvSet();
    }
}
