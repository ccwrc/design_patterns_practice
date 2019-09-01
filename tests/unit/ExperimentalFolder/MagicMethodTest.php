<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\{MagicMethod, MicroLogger};

use PHPUnit\Framework\TestCase;

class MagicMethodTest extends TestCase
{
    /**
     * @var string
     */
    private static $magicMethodName = 'Harry Houdini';
    /**
     * @var int
     */
    private static $magicMethodNumber = 6;

    public function testCreate(): MagicMethod
    {
        $object = new MagicMethod(MagicMethodTest::$magicMethodName, MagicMethodTest::$magicMethodNumber);
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
        $this->expectOutputString(MagicMethodTest::$magicMethodName);
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
        $this->assertEquals(MagicMethodTest::$magicMethodNumber, $magicMethod->number);

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
        $this->assertSame(MagicMethod::NAME_AFTER_DESERIALIZATION, $unserializableMm->getName());
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

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testIsSet(MagicMethod $magicMethod): void
    {
        $this->assertFalse(isset($magicMethod->nonexistentProperty));
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testUnset(MagicMethod $magicMethod): void
    {
        $this->expectException(\Exception::class);
        unset($magicMethod->nonexistentProperty);
    }

    /**
     * @depends testCreate
     * @param MagicMethod $magicMethod
     */
    public function testClone(MagicMethod $magicMethod): void
    {
        $counterForFirstClone = 1;
        $counterForThirdClone = 3;

        $cloneNo1 = clone $magicMethod;
        $this->assertTrue($cloneNo1->isClone());
        $this->assertSame($counterForFirstClone, $cloneNo1->getCloneNumber());

        $cloneNo2 = clone $magicMethod;
        $this->assertSame(MagicMethodTest::$magicMethodName, $cloneNo2->getName());
        $this->assertSame(MagicMethodTest::$magicMethodNumber, $cloneNo2->getNumber());

        $cloneNo3 = clone $magicMethod;
        $this->assertTrue($cloneNo3->isClone());
        $this->assertSame($counterForThirdClone, $cloneNo3->getCloneNumber());

        $this->assertFalse($magicMethod->isClone());
        $this->assertSame(null, $magicMethod->getCloneNumber());
    }
}
