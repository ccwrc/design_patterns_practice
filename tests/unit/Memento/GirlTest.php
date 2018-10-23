<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Memento;

use Patterns\Memento\Girl;

use PHPUnit\Framework\TestCase;

class GirlTest extends TestCase
{
    public function testCreate(): Girl
    {
        $girl = new Girl('Mathilda');

        $this->assertInstanceOf(Girl::class, $girl);
        $this->assertTrue($girl->isGrandmaLives());

        return $girl;
    }
}
