<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Memento;

use Patterns\Memento\Hunter;

use PHPUnit\Framework\TestCase;

class HunterTest extends TestCase
{
    public function testDoesHaveWeapon(): void
    {
        $hunter = new Hunter('Tex red neck with a rifle');

        $this->assertFalse($hunter->doesHaveWeapon());
    }
}
