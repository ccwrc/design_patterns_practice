<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\TypedPropertiesTwoZero;

use PHPUnit\Framework\TestCase;

class TypedPropertiesTwoZeroTest extends TestCase
{
    public function testCreate(): void
    {
        $tp20 = new TypedPropertiesTwoZero('plain string');

        $this->assertInstanceOf(TypedPropertiesTwoZero::class, $tp20);
    }
}
