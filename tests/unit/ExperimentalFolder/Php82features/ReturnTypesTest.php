<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\ReturnTypes;
use PHPUnit\Framework\TestCase;

class ReturnTypesTest extends TestCase
{
    public function testReturnTypes(): void
    {
        $this->assertTrue(ReturnTypes::getTrue());
        $this->assertFalse(ReturnTypes::getFalse());
        $this->assertNull(ReturnTypes::getNull());
    }
}
