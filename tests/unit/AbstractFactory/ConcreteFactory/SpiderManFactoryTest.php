<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\ConcreteFactory\SpiderManFactory;

use PHPUnit\Framework\{Error\Error, TestCase};

class SpiderManFactoryTest extends TestCase
{
    public function testCatchCriminals(): void
    {
        $criminals = [
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

        // splat operator test
        $this->assertIsArray($spiderMan->catchCriminals(...$criminals));
        $this->assertIsArray($spiderMan->catchCriminals('Carlos', 'Capone'));
        $this->assertTrue(in_array('Carlos', $spiderMan->catchCriminals('Carlos')));
    }

    /**
     * @expectedException Error
     */
    function testCatchCriminalsError(): void
    {
        $spiderMan = new SpiderManFactory('Peter');
        $spiderMan->catchCriminals('John', 11);
    }
}
