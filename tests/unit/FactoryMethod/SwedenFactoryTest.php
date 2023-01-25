<?php

declare(strict_types=1);

namespace Patterns\tests\unit\FactoryMethod;

use Patterns\FactoryMethod\Accessory\{BenWaBalls, EroticAccessory, Handcuffs, Rope};
use Patterns\FactoryMethod\{EroticFactory, SwedenFactory};
use PHPUnit\Framework\TestCase;

class SwedenFactoryTest extends TestCase
{
    public function testCanCreateHandcuffs(): void
    {
        $handcuffs = SwedenFactory::createEroticAccessoryFor(SwedenFactory::FOR_MAN);

        $this->assertInstanceOf(Handcuffs::class, $handcuffs);
        $this->assertInstanceOf(EroticAccessory::class, $handcuffs);
        $this->assertEquals(EroticFactory::PLEASURE_LEVEL_100, $handcuffs->getPleasureLevel());
    }

    public function testCanCreateBenWaBalls(): void
    {
        $balls = SwedenFactory::createEroticAccessoryFor(SwedenFactory::FOR_WOMAN);

        $this->assertInstanceOf(BenWaBalls::class, $balls);
        $this->assertInstanceOf(EroticAccessory::class, $balls);
        $this->assertEquals(EroticFactory::PLEASURE_LEVEL_300, $balls->getPleasureLevel());
    }

    public function testCanCreateRope(): void
    {
        $rope = SwedenFactory::createEroticAccessoryFor(SwedenFactory::FOR_BI);

        $this->assertInstanceOf(Rope::class, $rope);
        $this->assertInstanceOf(EroticAccessory::class, $rope);
        $this->assertEquals(EroticFactory::PLEASURE_LEVEL_MINUS_50, $rope->getPleasureLevel());
    }
}
