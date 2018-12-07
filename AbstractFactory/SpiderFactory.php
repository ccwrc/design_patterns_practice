<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory;

abstract class SpiderFactory
{
    /**
     * @var string
     */
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function makeWeb(int $strength): Cobweb;
}
