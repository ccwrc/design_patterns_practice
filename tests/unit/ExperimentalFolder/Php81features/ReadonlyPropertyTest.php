<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php81features;

use Patterns\ExperimentalFolder\Php81features\ReadonlyProperty;
use PHPUnit\Framework\TestCase;

class ReadonlyPropertyTest extends TestCase
{
    public function testSetTitle(): void
    {
        $book = new ReadonlyProperty(
            'Fiasko by Stanisław Lem',
            379
        );

        $this->expectException(\Error::class);
        $book->title = 'Failure';
    }

    public function testUnsetTitle(): void
    {
        $book = new ReadonlyProperty(
            'Fiasko by Stanisław Lem',
            379
        );

        $this->expectException(\Error::class);
        unset($book->title);
    }

    public function testIsUsed(): void
    {
        $book = new ReadonlyProperty(
            'Niezwyciężony by Stanisław Lem',
            260
        );

        $this->assertFalse($book->itIsUsed());

        $book->setIsUsed(true);
        $this->assertTrue($book->itIsUsed());

        $this->expectException(\Error::class);
        $book->setIsUsed(true);
    }

    public function testRentalTime(): void
    {
        $book = new ReadonlyProperty(
            'Ostatni eksperyment by Julia Iwanowa',
            126
        );

        $this->assertEquals($book::DEFAULT_RENTAL_TIME, $book->rentalTime);

        $book->rentalTime = 12;
        $this->assertEquals(12, $book->rentalTime);

        $book->rentalTime = 77;
        $this->assertEquals(77, $book->rentalTime);
    }
}
