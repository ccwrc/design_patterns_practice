<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\EnvironmentVariables;
use PHPUnit\Framework\TestCase;

class EnvironmentVariablesTest extends TestCase
{
    public function testEnvFileValidation(): void
    {
        EnvironmentVariables::load();

        $this->assertSame(
            EnvironmentVariables::VALIDATION_STRING_FOR_ENV_FILE,
            ($_ENV['VALIDATION_DATA'] ?? 'fail'),
            'Create and complete your own .env file in the main directory based on .env.dist'
        );
    }
}
