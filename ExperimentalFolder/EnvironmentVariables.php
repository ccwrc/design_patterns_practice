<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

use Symfony\Component\Dotenv\Dotenv;

final class EnvironmentVariables
{
    /**
     * Class instance is not required and not desirable.
     */
    private function __construct()
    {
    }

    /**
     * Gets var from .env file. Variables available in the global array $_ENV ( $_ENV['key'] ).
     */
    public static function load(): void
    {
        $dotEnv = new Dotenv();
        $dotEnv->load(dirname(__DIR__, 1) . '/.env');
    }
}