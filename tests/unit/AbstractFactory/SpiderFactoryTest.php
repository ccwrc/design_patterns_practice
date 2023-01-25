<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory;

use Patterns\AbstractFactory\{Cobweb, SpiderFactory};
use PHPUnit\Framework\TestCase;

class SpiderFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $object = new class('Spider name') extends SpiderFactory
        {
            /**
             * @param int $strength
             *
             * @return Cobweb
             */
            public function makeWeb(int $strength): Cobweb
            {
                $cobweb = new class($strength) extends Cobweb
                {
                };
                return $cobweb;
            }
        };

        $this->assertInstanceOf(SpiderFactory::class, $object);
    }
}
