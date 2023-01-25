<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php80features;

use Patterns\ExperimentalFolder\Php80features\MixedType;
use PHPUnit\Framework\TestCase;

class MixedTypeTest extends TestCase
{
    public function testGetType(): void
    {
        $this->assertSame('integer', MixedType::getType(7));
        $this->assertSame('string', MixedType::getType('7'));
        $this->assertSame('double', MixedType::getType(7.77));
        $this->assertSame('array', MixedType::getType([7]));
        $this->assertSame('object', MixedType::getType(new \Exception('7')));
    }
}
