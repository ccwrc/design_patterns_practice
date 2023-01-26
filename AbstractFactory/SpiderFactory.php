<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory;

abstract class SpiderFactory
{
    public function __construct(public string $name)
    {
    }

    /**
     * @param int $strength
     *
     * @return Cobweb
     */
    abstract public function makeWeb(int $strength): Cobweb;
}
