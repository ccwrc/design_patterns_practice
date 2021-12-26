<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * Creates log file in current directory if needed.
 */
final class MicroLogger
{
    public const LOGGER_FILENAME = 'MicroLogger.txt';

    /**
     * @var string[]
     */
    private static array $logs = [];

    /**
     * Class instance is not required and not desirable.
     */
    private function __construct()
    {
    }

    /**
     * Add log with actual date & time.
     *
     * @param string $log
     */
    public static function addLog(string $log): void
    {
        self::$logs[] = $log;

        EnvironmentVariables::load();
        if ('true' === ($_ENV['SAVE_LOGS_TO_FILE'] ?? false)) {
            $actualDateTime = \date('Y-m-d G:i:s');
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
     *
     * @param string $log
     */
    private static function addLogToTxtFile(string $log): void
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . self::LOGGER_FILENAME;

        try {
            if (\is_writable($path)) {
                $file = \fopen($path, 'a');
                \fwrite($file, $log);
                \fclose($file);

                return;
            }

            $file = \fopen($path, 'w');
            \fwrite($file, $log);
            \fclose($file);
        } catch (\Throwable $throwable) {
            return;
        }
    }
}
