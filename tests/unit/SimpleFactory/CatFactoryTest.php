<?php

declare(strict_types=1);

namespace Patterns\tests\unit\SimpleFactory;

use Patterns\SimpleFactory\{Cat, CatFactory};
use PHPUnit\Framework\TestCase;

class CatFactoryTest extends TestCase
{
    public function testCreateCat(): void
    {
        $cat = CatFactory::createCat(true, true);

        $this->assertInstanceOf(Cat::class, $cat);
    }

    public function testCreateFluffyCat(): void
    {
        $fluffyCat = CatFactory::createFluffyCat(false);

        $this->assertInstanceOf(Cat::class, $fluffyCat);
        $this->assertTrue($fluffyCat->isFluffy());
    }
}
