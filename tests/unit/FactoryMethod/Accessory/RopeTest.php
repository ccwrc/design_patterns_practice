<?php

declare(strict_types=1);

namespace Patterns\tests\unit\FactoryMethod\Accessory;

use Patterns\FactoryMethod\Accessory\{EroticAccessory, Rope};

use PHPUnit\Framework\TestCase;

class RopeTest extends TestCase
{
    /**
     * @return Rope
     */
    public function testCreate(): Rope
    {
        $rope = new Rope();
        $this->assertInstanceOf(EroticAccessory::class, $rope);
        $this->assertInstanceOf(Rope::class, $rope);

        return $rope;
    }

    /**
     * @depends testCreate
     * @param Rope $rope
     */
    public function testSetPleasureLevel(Rope $rope): void
    {
        $this->assertEquals(0, $rope->getPleasureLevel());

        $newPleasureLevel = 256;
        $rope->setPleasureLevel($newPleasureLevel);
        $this->assertEquals($newPleasureLevel, $rope->getPleasureLevel());
    }
}
