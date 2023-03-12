<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\AllowDynamicProperties;
use PHPUnit\Framework\TestCase;

class AllowDynamicPropertiesTest extends TestCase
{
    public function testAddProperty(): void
    {
        $propertyToCompare = 'new';

        $object = new AllowDynamicProperties();
        $object->newProperty = $propertyToCompare;

        $this->assertSame($propertyToCompare, $object->newProperty);
    }
}
