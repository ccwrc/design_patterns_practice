<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Prototype;

use Patterns\Prototype\{Sarah, TerminatorPrototype};
use PHPUnit\Framework\TestCase;

class SarahTest extends TestCase
{
    public function testProviderObjectWithLocation(): TerminatorPrototype
    {
        $terminator = new class(69) extends TerminatorPrototype
        {
            public function getLocation(): int
            {
                return 69;
            }

            public function __clone()
            {
            }

            /**
             * @param Sarah $sarah
             *
             * @return bool
             */
            public function tryKillSarah(Sarah $sarah): bool
            {
                return false; // irrelevant for tests
            }
        };
        $this->assertInstanceOf(TerminatorPrototype::class, $terminator);

        return $terminator;
    }

    public function testCreate(): void
    {
        $sarah = new Sarah(true);

        $this->assertInstanceOf(Sarah::class, $sarah);
        $this->assertTrue($sarah->isLives());
    }

    public function testIsWillToSurvive(): void
    {
        $sarah = new Sarah(true);

        $this->assertTrue($sarah->isWillToSurvive());
    }

    public function testGetLocation(): void
    {
        $sarah = new Sarah(true);

        $this->assertIsInt($sarah->getLocation());
    }

    public function testChangeLocation(): void
    {
        $sarah = new Sarah(true);
        $sarah->changeLocation(22);

        $this->assertEquals(22, $sarah->getLocation());
    }

    /**
     * @depends testProviderObjectWithLocation
     */
    public function testKillSarah(TerminatorPrototype $terminator): void
    {
        $sarah = new Sarah(true);
        $sarah->changeLocation(69); // 69 is also the location of terminator

        $this->assertTrue($sarah->killSarah($terminator));
    }

    /**
     * @depends testProviderObjectWithLocation
     */
    public function testNotKillSarah(TerminatorPrototype $terminator): void
    {
        $sarah = new Sarah(true);
        $sarah->changeLocation(55); // terminator location: 69

        $this->assertFalse($sarah->killSarah($terminator));
    }
}
