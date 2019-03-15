<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

use Patterns\Facade\{AirConditioning, Internet, TvSet};

class FullRelaxationEncore
{
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
        $this->airConditioning = new AirConditioning(20);
        $this->internet = new Internet();
        $this->tvSet = new TvSet();
    }

    public function makeItHappen(int $temperature): void
    {
        $this->airConditioning->setTemperature($temperature);
        $this->airConditioning->turnOnAirConditioning();
        $this->internet->connect();
        $this->tvSet->turnOnTvSet();
    }
}
