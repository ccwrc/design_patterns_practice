<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\ConcreteFactory\SpiderManFactory;

use PHPUnit\Framework\TestCase;

class SpiderManFactoryTest extends TestCase
{
    public function testCatchCriminals(): void
    {
        $criminals =             [
            'Carlo Gambino',
            'Ching Shih',
            'Adam Worth',
            'Tom Horn',
            'D. B. Cooper',
            'Ted Kaczynski',
            'Leonardo Notarbartolo',
            'Charles Manson',
            'Al Capone'
        ];
        $spiderMan = new SpiderManFactory('Peter');

        $this->assertIsArray($spiderMan->catchCriminals(...$criminals));
        $this->assertTrue(in_array('Carlos', $spiderMan->catchCriminals('Carlos')));
    }
}
