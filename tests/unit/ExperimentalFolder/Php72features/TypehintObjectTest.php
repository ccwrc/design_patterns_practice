<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php72features;

use Patterns\ExperimentalFolder\Php72features\TypehintObject;

use PHPUnit\Framework\TestCase;

class TypehintObjectTest extends TestCase
{
    public function testCreate(): void
    {
        $object = new TypehintObject(new \DateTimeImmutable());
        $this->assertInstanceOf(TypehintObject::class, $object);

        $object2 = new TypehintObject(new \DateTime());
        $this->assertInstanceOf(TypehintObject::class, $object2);
    }

    public function testFailCrate(): void
    {
        $nonObjectVar = 'Where do cats come from on the internet? And why are they attracting chicks?';

        $this->expectException(\TypeError::class);
        new TypehintObject($nonObjectVar);
    }
}
