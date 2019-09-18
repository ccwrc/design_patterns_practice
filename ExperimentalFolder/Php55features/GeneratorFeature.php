<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php55features;

/**
 * @link https://www.php.net/manual/en/language.generators.overview.php docs.
 */
class GeneratorFeature
{
    private static $pathToTestTxtFile = __DIR__ . '/TestGenerator.txt';

    public function __construct()
    {
        self::createTestTxtFile();
        self::fillUpTestTxtFile(5);
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        // delete file from constructor
    }

    private static function createTestTxtFile(): void
    {
        $file = \fopen(self::$pathToTestTxtFile, 'w');
        \fclose($file);
    }

    private static function fillUpTestTxtFile(int $howManyLines): void
    {
        $file = \fopen(self::$pathToTestTxtFile, 'a');
        for ($i = 1; $i <= abs($howManyLines); $i++) {
            \fwrite($file, 'line ' . $i . "\n");
        }
        \fclose($file);
    }

}
