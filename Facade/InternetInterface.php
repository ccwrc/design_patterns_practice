<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface InternetInterface
{
    /**
     * @return string
     */
    public function connect(): string;

    /**
     * @return string
     */
    public function disconnect(): string;
}
