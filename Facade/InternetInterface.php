<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface InternetInterface
{
    /**
     * connect to Internet - set flag
     * @return string
     */
    public function connect(): string;

    /**
     * disconnect from the Internet - set flag
     * @return string
     */
    public function disconnect(): string;

    /**
     * @return bool
     */
    public function isOnline(): bool;
}
