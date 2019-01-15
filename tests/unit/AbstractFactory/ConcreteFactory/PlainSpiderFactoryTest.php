<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\{Cobweb, ConcreteFactory\PlainSpiderFactory};

use PHPUnit\Framework\TestCase;

class PlainSpiderFactoryTest extends TestCase
{
    /**
     * @return PlainSpiderFactory
     */
    public function testCreate(): PlainSpiderFactory
    {
        $plainSpider = new PlainSpiderFactory('Arachnea');
        $this->assertInstanceOf(PlainSpiderFactory::class, $plainSpider);

        return $plainSpider;
    }

    /**
     * @depends testCreate
     * @param PlainSpiderFactory $plainSpider
     */
    public function testCanCreateCobweb(PlainSpiderFactory $plainSpider): void
    {
        $this->assertInstanceOf(Cobweb::class, $plainSpider->makeWeb(8));
    }
}
