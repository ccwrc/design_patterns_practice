<?php

declare(strict_types=1);

namespace Patterns\tests\unit\SimpleFactory;

use Patterns\SimpleFactory\Cat;

use PHPUnit\Framework\TestCase;

class CatTest extends TestCase
{
    public function testCreate(): void
    {
        $fluffy = true;
        $annoying = false;
        $cat = new Cat($fluffy, $annoying);

        $this->assertInstanceOf(Cat::class, $cat);
        $this->assertSame($fluffy, $cat->isFluffy());
        $this->assertSame($annoying, $cat->isAnnoying());
    }

    public function testGetVoicePlainCat(): void
    {
        $cat = new Cat(true, false);

        $this->assertFalse($cat->isAnnoying());
        $this->assertEquals('meow, meow', $cat->getVoice());
    }

    public function testGetVoiceAnnoyingCat(): void
    {
        $cat = new Cat(false, true);

        $this->assertTrue($cat->isAnnoying());
        $this->assertTrue(is_string($cat->getVoice()));
        $this->assertEquals('Go fuck yourself men!', $cat->getVoice());
    }
}
