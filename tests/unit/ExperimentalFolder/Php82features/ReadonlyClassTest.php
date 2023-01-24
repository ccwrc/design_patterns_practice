<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\ReadonlyClass;
use PHPUnit\Framework\TestCase;

class ReadonlyClassTest extends TestCase
{
    public function testSetTitle(): void
    {
        $book = new ReadonlyClass(
            'Bill, the Galactic Hero on the Planet of Hippies from Hell',
            224
        );

        $this->expectError();
        $book->title = 'Bill, the Galactic Hero on the Planet of Ten Thousand Bars';
    }

    public function testUnsetTitle(): void
    {
        $book = new ReadonlyClass(
            'Bill, the Galactic Hero on the Planet of Tasteless Pleasure',
            289
        );

        $this->expectError();
        unset($book->title);
    }

    public function testIsUsed(): void
    {
        $book = new ReadonlyClass(
            'Bill, the Galactic Hero on the Planet of Robot Slaves',
            187
        );

        $this->assertFalse($book->itIsUsed());

        $book->setIsUsed(true);
        $this->assertTrue($book->itIsUsed());

        $this->expectError();
        $book->setIsUsed(true);
    }
}
