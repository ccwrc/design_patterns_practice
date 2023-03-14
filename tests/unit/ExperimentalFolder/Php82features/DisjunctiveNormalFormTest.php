<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\{DisjunctiveNormalForm,
    Interfaces\OtherInterface,
    Interfaces\SomeInterface
};
use PHPUnit\Framework\TestCase;

class DisjunctiveNormalFormTest extends TestCase
{
    public function testGiveBack(): void
    {
        $this->assertNull(DisjunctiveNormalForm::giveBack(null));
    }

    public function testGiveBackError(): void
    {
        $someInterfaceObject = new class() implements SomeInterface {
        };

        $this->expectError();
        $giveBack = DisjunctiveNormalForm::giveBack($someInterfaceObject);
    }

    public function testGiveBackInterfaces(): void
    {
        $object = new class() implements SomeInterface, OtherInterface {
        };

        $this->assertIsObject(DisjunctiveNormalForm::giveBack($object));
    }
}
