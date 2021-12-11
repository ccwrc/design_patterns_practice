<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory;

abstract class Cobweb
{
    protected int $strength;

    protected string $productionTechnology;

    public function __construct(int $strength)
    {
        $this->strength = $strength;
    }
}
