<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

final class MicroLogger
{
    /**
     * @var string[]
     */
    private static $logs = [];

    /**
     * Class instance is not required and not desirable.
     */
    private function __construct()
    {
    }

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
    public static function getAllLogs(): array
    {
        return self::$logs;
    }

    private function addLogToTxtFile(): void
    {
        // TODO
        // check dir is r/w
        // check is file exists / create
        // open w
        // write
        // close
    }
}
