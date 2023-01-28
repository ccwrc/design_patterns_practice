<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface InternetInterface
{
    /**
     * Connect to Internet - set flag.
     */
    public function connect(): string;

    /**
     * Disconnect from the Internet - set flag.
     */
    public function disconnect(): string;

    public function isOnline(): bool;
}
