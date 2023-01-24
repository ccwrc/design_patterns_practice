<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php80features;

use Patterns\ExperimentalFolder\Php80features\ConstructorPropertyPromotion;
use PHPUnit\Framework\TestCase;

class ConstructorPropertyPromotionTest extends TestCase
{
    public function testAddAll(): void
    {
        $object = new ConstructorPropertyPromotion(
            700,
            '70',
            [0 => 7]
        );

        $this->assertEquals(777, $object->addAll());
    }
}
