<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\MagicMethod;

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
    public function testToString(MagicMethod $magicMethod): void
    {
        echo $magicMethod;
        $this->expectOutputString('Harry Houdini');
    }
}
