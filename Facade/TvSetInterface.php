<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface TvSetInterface
{
    /**
     * @return string
     */
    public function turnOn(): string;

    /**
     * @return string
     */
    public function disable(): string;
}
