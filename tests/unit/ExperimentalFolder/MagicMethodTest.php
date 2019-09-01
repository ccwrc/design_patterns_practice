<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\{MagicMethod, MicroLogger};

use PHPUnit\Framework\TestCase;

class MagicMethodTest extends TestCase
{
    public function testCreate(): MagicMethod
    {
        $object = new MagicMethod('Harry Houdini', 6);
        $this->assertInstanceOf(MagicMethod::class, $object);

        return $object;
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testCall(MagicMethod $magicMethod): void
    {
        $this->expectException(\Exception::class);
        $magicMethod->fakeMethodName();
    }

    public function testCallStatic(): void
    {
        $this->expectException(\Exception::class);
        MagicMethod::fakeStaticMethodName();
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testToString(MagicMethod $magicMethod): void
    {
        echo $magicMethod;
        $this->expectOutputString('Harry Houdini');
    }

    public function testDestruct(): void
    {
        $object = new MagicMethod('Maciej Pol', 7);
        unset($object);

        $this->assertTrue(MicroLogger::isLogPresent('I\'m going to heaven.'));
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testGet(MagicMethod $magicMethod): void
    {
        $this->assertEquals(6, $magicMethod->number);

        $this->expectException(\Exception::class);
        $magicMethod->fakeProperty;
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testSet(MagicMethod $magicMethod): void
    {
        $this->expectException(\Exception::class);
        $magicMethod->fakeProperty = 11;
    }

    public function testSleepAndWakeUp(): void
    {
        $name = 'plain name';
        $number = 747;
        $mm = new MagicMethod($name, $number);
        $this->assertSame($name, $mm->getName());
        $this->assertSame($number, $mm->getNumber());

        $serializedMm = serialize($mm);
        /** @var $unserializableMm MagicMethod */
        $unserializableMm = unserialize($serializedMm);
        $this->assertSame(MagicMethod::UNSERIALIZABLE_NAME, $unserializableMm->getName());
        $this->assertSame($number, $unserializableMm->getNumber());
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testInvoke(MagicMethod $magicMethod): void
    {
        $this->assertTrue(is_callable($magicMethod));
        $this->assertTrue(is_string($magicMethod()));
        $this->assertSame(MagicMethod::INVOKE_MESSAGE, $magicMethod());
    }
}
