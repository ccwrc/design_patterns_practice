<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\{Cobweb, Product\PlainSpiderCobweb, SpiderFactory};

final class PlainSpiderFactory extends SpiderFactory
{
    /**
     * @inheritDoc
     */
    public function makeWeb(int $strength): Cobweb
    {
        return new PlainSpiderCobweb($strength);
    }
}
