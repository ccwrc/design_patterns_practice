<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\EnvironmentVariables;

use PHPUnit\Framework\TestCase;

class MicroLoggerTest extends TestCase
{
    public function testIsExperimentalFolderIsWritable(): void
    {
        EnvironmentVariables::load();

        if ('true' === ($_ENV['TEST_IS_EXPERIMENTAL_FOLDER_IS_WRITABLE'] ?? false)) {
            $this->assertTrue(\is_writable(\dirname(__DIR__, 3) . '/ExperimentalFolder'));
        } else {
            $this->markTestSkipped('Test disabled in the configuration .env (.env.dist) file.');
        }
    }
}
