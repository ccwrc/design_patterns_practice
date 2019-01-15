<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory\Product;

use Patterns\AbstractFactory\{Cobweb, Product\PlainSpiderCobweb};

use PHPUnit\Framework\TestCase;

class PlainSpiderCobwebTest extends TestCase
{
    public function testCreate(): void
    {
        $object = new PlainSpiderCobweb(11);

        $this->assertInstanceOf(Cobweb::class, $object);
    }
}
