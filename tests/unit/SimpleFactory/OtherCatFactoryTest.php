<?php

declare(strict_types=1);

namespace Patterns\tests\unit\SimpleFactory;

use Patterns\SimpleFactory\{Cat, OtherCatFactory};

use PHPUnit\Framework\TestCase;

class OtherCatFactoryTest extends TestCase
{
    public function testCreateCat(): void
    {
        $cat = (new OtherCatFactory())->createCat(true, false);

        $this->assertInstanceOf(Cat::class, $cat);
    }

    public function testCreateFluffyCat(): void
    {
        $fluffyCat = (new OtherCatFactory())->createFluffyCat(true);

        $this->assertInstanceOf(Cat::class, $fluffyCat);
        $this->assertTrue($fluffyCat->isFluffy());
    }
}
