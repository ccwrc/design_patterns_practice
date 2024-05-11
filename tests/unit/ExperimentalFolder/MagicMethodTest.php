<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\{MagicMethod, MicroLogger};
use PHPUnit\Framework\TestCase;

class MagicMethodTest extends TestCase
{
    private static string $magicMethodName = 'Harry Houdini';

    private static int $magicMethodNumber = 6;

    public function testCreate(): MagicMethod
    {
        $object = new MagicMethod(self::$magicMethodName, self::$magicMethodNumber);
        $this->assertInstanceOf(MagicMethod::class, $object);

        return $object;
    }

    /**
     * @depends testCreate
     *
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
     *
     * @param MagicMethod $magicMethod
     */
    public function testToString(MagicMethod $magicMethod): void
    {
        echo $magicMethod;
        $this->expectOutputString(self::$magicMethodName);
    }

    public function testDestruct(): void
    {
        $object = new MagicMethod('Maciej Pol', 7);
        unset($object);

        $this->assertTrue(MicroLogger::isLogPresent(MagicMethod::DESTRUCT_MESSAGE));
    }

    /**
     * @depends testCreate
     *
     * @param MagicMethod $magicMethod
     */
    public function testGet(MagicMethod $magicMethod): void
    {
        $this->assertEquals(self::$magicMethodNumber, $magicMethod->number);

        $this->expectException(\Exception::class);
        $magicMethod->fakeProperty;
    }

    /**
     * @depends testCreate
     *
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
     *
     * @param MagicMethod $magicMethod
     */
    public function testInvoke(MagicMethod $magicMethod): void
    {
        $this->assertIsCallable($magicMethod);
        $this->assertIsString($magicMethod());
        $this->assertSame(MagicMethod::INVOKE_MESSAGE, $magicMethod());
    }

    /**
     * @depends testCreate
     *
     * @param MagicMethod $magicMethod
     */
    public function testIsSet(MagicMethod $magicMethod): void
    {
        $this->assertFalse(isset($magicMethod->nonexistentProperty));
    }

    /**
     * @depends testCreate
     *
     * @param MagicMethod $magicMethod
     */
    public function testUnset(MagicMethod $magicMethod): void
    {
        $this->expectException(\Exception::class);
        unset($magicMethod->nonexistentProperty);
    }

    /**
     * @depends testCreate
     *
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
        $this->assertSame(self::$magicMethodName, $cloneNo2->getName());
        $this->assertSame(self::$magicMethodNumber, $cloneNo2->getNumber());

        $cloneNo3 = clone $magicMethod;
        $this->assertTrue($cloneNo3->isClone());
        $this->assertSame($counterForThirdClone, $cloneNo3->getCloneNumber());

        $this->assertFalse($magicMethod->isClone());
        $this->assertNull($magicMethod->getCloneNumber());
    }

    /**
     * @link http://docs.php.net/manual/pl/function.eval.php eval() docs.
     * @link http://docs.php.net/manual/pl/function.var-export.php var_export() docs
     *
     * @depends testCreate
     *
     * @param MagicMethod $magicMethod
     */
    public function testSetState(MagicMethod $magicMethod): void
    {
        eval('$variableOutOfNowhere = ' . var_export($magicMethod, true) . ';'); // $variableOutOfNowhere is born here
        $this->assertEquals(MagicMethod::SET_STATE_MESSAGE, $variableOutOfNowhere); /** @phpstan-ignore-line */
    }

    /**
     * @depends testCreate
     *
     * @param MagicMethod $magicMethod
     */
    public function testDebugInfo(MagicMethod $magicMethod): void
    {
        $message = MagicMethod::VAR_DUMP_MESSAGE;
        $this->expectOutputRegex("/$message/");
        print_r($magicMethod);
    }
}
