<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php80features;

use Patterns\ExperimentalFolder\Php80features\UnionTypes;
use PHPUnit\Framework\TestCase;

class UnionTypesTest extends TestCase
{
    public function testGet(): void
    {
        $this->assertIsInt(UnionTypes::get(1));
        $this->assertIsString(UnionTypes::get('1'));
        $this->assertIsArray(UnionTypes::get([1]));
    }
}
