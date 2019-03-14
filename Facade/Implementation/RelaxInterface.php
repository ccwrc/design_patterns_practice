<?php

declare(strict_types=1);

namespace Patterns\Facade\Implementation;

interface RelaxInterface
{
    /**
     * @param int $temperature
     */
    public function makeItHappen(int $temperature): void;
}
