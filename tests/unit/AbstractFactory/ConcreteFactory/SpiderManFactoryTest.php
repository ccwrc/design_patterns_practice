<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\{Cobweb, ConcreteFactory\SpiderManFactory};
use PHPUnit\Framework\{TestCase};

class SpiderManFactoryTest extends TestCase
{
    /**
     * @return SpiderManFactory
     */
    public function testCreate(): SpiderManFactory
    {
        $spiderMan = new SpiderManFactory('Peter');
        $this->assertInstanceOf(SpiderManFactory::class, $spiderMan);

        return $spiderMan;
    }

    /**
     * @depends testCreate
     *
     * @param SpiderManFactory $spiderMan
     */
    public function testCatchCriminals(SpiderManFactory $spiderMan): void
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

        // splat operator test
        $this->assertIsArray($spiderMan->catchCriminals(...$criminals));
        $this->assertIsArray($spiderMan->catchCriminals('Carlos', 'Capone'));
        $this->assertContains('Carlos', $spiderMan->catchCriminals('Carlos'));
    }

    /**
     * @depends testCreate
     *
     * @param SpiderManFactory $spiderMan
     */
    public function testCatchCriminalsError(SpiderManFactory $spiderMan): void
    {
        $this->expectException(\Error::class);
        $spiderMan->catchCriminals('John', 911);
    }

    /**
     * @depends testCreate
     *
     * @param SpiderManFactory $spiderMan
     */
    public function testCanCreateCobweb(SpiderManFactory $spiderMan): void
    {
        $this->assertInstanceOf(Cobweb::class, $spiderMan->makeWeb(13));
    }
}
