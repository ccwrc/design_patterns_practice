<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

final class MicroLogger
{
    /**
     * @var string[]
     */
    private static $logs = [];

    public static function addLog(string $log): void
    {
        self::$logs[] = $log;
    }

    public static function isLogPresent(string $log): bool
    {
        return \in_array($log, self::$logs, true);
    }

    /**
     * @return string[]
     */
    public static function getLogCollection(): array
    {
        return self::$logs;
    }
}
