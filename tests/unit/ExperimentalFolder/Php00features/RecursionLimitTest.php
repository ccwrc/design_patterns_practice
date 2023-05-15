<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php00features;

use Patterns\ExperimentalFolder\Php00features\RecursionLimit;
use PHPUnit\Framework\TestCase;

class RecursionLimitTest extends TestCase
{
    public function testOverloadCountDownToZeroFrom(): void
    {
        $maxNestingLevel = ini_get('xdebug.max_nesting_level');
        if (false === $maxNestingLevel) {
            $this->markTestSkipped('No limit for xdebug.max_nesting_level - test skipped');
        }

        $this->expectError();
        RecursionLimit::countDownToZeroFrom((int)$maxNestingLevel + 1);
    }
}
