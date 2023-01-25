<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\ExceptionInToString;
use PHPUnit\Framework\TestCase;

class ExceptionInToStringTest extends TestCase
{
    public function testThrowException(): void
    {
        $object = new ExceptionInToString(ExceptionInToString::EXCEPTION_THROWING_STRING);

        $this->expectException(\Exception::class);
        (string)$object;
    }
}
