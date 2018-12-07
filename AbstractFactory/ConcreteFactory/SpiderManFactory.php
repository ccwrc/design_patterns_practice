<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\{Cobweb, Product\SpiderManCobweb, SpiderFactory};

final class SpiderManFactory extends SpiderFactory
{
    /**
     * @param int $strength
     * @return Cobweb
     */
    public function makeWeb(int $strength): Cobweb
    {
        return new SpiderManCobweb($strength);
    }
}
