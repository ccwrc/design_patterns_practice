<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php55features;

/**
 * @link https://www.php.net/manual/en/language.generators.overview.php docs.
 */
final class GeneratorFeature
{
    private static $pathToTestTxtFile = __DIR__ . '/TestGenerator.txt';

    public function __construct(int $numberOfLinesInFileForTesting)
    {
        self::createTestTxtFile();
        self::fillUpTestTxtFile($numberOfLinesInFileForTesting);
    }

    public function operateOnFileNoUseGenerator(): void
    {
        $lines = \file(self::$pathToTestTxtFile);
        $result = '';

        foreach ($lines as $line) {
            $result .= 'modification ' . $line;
        }

        \file_put_contents(self::$pathToTestTxtFile, $result);
    }

    public function operateOnFileWithGenerator(): void
    {
        function getLines($file)
        {
            while ($line = fgets($file)) {
                yield $line;
            }
        }

        $file = \fopen(self::$pathToTestTxtFile, 'rb');
        $lines = getLines($file);
        $result = '';

        foreach ($lines as $line) {
            $result .= 'modification ' . $line;
        }

        \fclose($file);
        \file_put_contents(self::$pathToTestTxtFile, $result);
    }

    public function __destruct()
    {
        // we try to clean up after ourselves.
        unlink(self::$pathToTestTxtFile);
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
