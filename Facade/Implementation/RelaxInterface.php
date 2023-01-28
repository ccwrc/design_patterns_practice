<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

interface RelaxInterface
{
    /**
     * Steps: set AirConditioning temperature, turn on AirConditioning, connect to Internet, turn on TvSet.
     */
    public function makeItHappen(int $temperature): void;
}
