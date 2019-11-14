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

        $actualDateTime = \date('Y-m-d G:i:s');

        EnvironmentVariables::load();
        if ('true' === $_ENV['SAVE_LOGS_TO_FILE']) {
            self::addLogToTxtFile('Time: ' . $actualDateTime . ' LOG: ' . $log . "\n");
        }
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

    /**
     * Saves log to hardcoded MicroLogger.txt file in current directory.
     * @param string $log
     */
    private static function addLogToTxtFile(string $log): void
    {
        try {
            if (\is_writable(__DIR__ . '/MicroLogger.txt')) {
                $file = \fopen(__DIR__ . '/MicroLogger.txt', 'a');
                \fwrite($file, $log);
                \fclose($file);
                return;
            }
            $file = \fopen(__DIR__ . '/MicroLogger.txt', 'w');
            \fwrite($file, $log);
            \fclose($file);
        } catch (\Throwable $throwable) {
            return;
        }
    }
}
