<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory;

abstract class Cobweb
{
    /**
     * @var int
     */
    protected $strength;
    /**
     * @var string
     */
    protected $productionTechnology;

    public function __construct(int $strength)
    {
        $this->strength = $strength;
    }
}
