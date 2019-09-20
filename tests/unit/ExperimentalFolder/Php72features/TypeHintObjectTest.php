<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php72features;

use Patterns\ExperimentalFolder\Php72features\TypeHintObject;

use PHPUnit\Framework\TestCase;

class TypeHintObjectTest extends TestCase
{
    public function testCreate(): void
    {
        $object = new TypeHintObject(new \DateTimeImmutable());
        $this->assertInstanceOf(TypeHintObject::class, $object);

        $object2 = new TypeHintObject(new \DateTime());
        $this->assertInstanceOf(TypeHintObject::class, $object2);
    }

    public function testFailCrate(): void
    {
        $nonObjectVar = 'Where do cats come from on the internet? And why are they attracting chicks?';

        $this->expectException(\TypeError::class);
        new TypeHintObject($nonObjectVar);
    }

    public function testGetObject(): void
    {
        $typeHintObject = new TypeHintObject(new \DateTime('now - 1 day'));

        $this->assertIsObject($typeHintObject->getJustPlainDate());
    }
}
