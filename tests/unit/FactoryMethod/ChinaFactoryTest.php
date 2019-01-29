<?php

declare(strict_types=1);

namespace Patterns\tests\unit\FactoryMethod;

use Patterns\FactoryMethod\{Accessory\EroticAccessory, ChinaFactory, EroticFactory};

use PHPUnit\Framework\TestCase;

class ChinaFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $chinaFactory = new ChinaFactory();

        $this->assertInstanceOf(ChinaFactory::class, $chinaFactory);
        $this->assertInstanceOf(EroticFactory::class, $chinaFactory);
    }

    public function testCanCreateEroticAccessory(): void
    {
        $this->assertInstanceOf(EroticAccessory::class, ChinaFactory::createEroticAccessoryFor(ChinaFactory::FOR_MAN));
        $this->assertInstanceOf(EroticAccessory::class, ChinaFactory::createEroticAccessoryFor(ChinaFactory::FOR_WOMAN));
        $this->assertInstanceOf(EroticAccessory::class, ChinaFactory::createEroticAccessoryFor(ChinaFactory::FOR_BI));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage is not a valid sex
     */
    public function testInvalidSexArgument(): void
    {
        ChinaFactory::createEroticAccessoryFor('Cat');
    }
}
