<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory\Product;

use Patterns\AbstractFactory\{Cobweb, Product\SpiderManCobweb};

use PHPUnit\Framework\TestCase;

class SpiderManCobwebTest extends TestCase
{
    public function testCreate(): void
    {
        $object = new SpiderManCobweb(77);

        $this->assertInstanceOf(Cobweb::class, $object);
    }
}
