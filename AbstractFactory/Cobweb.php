<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory;

abstract class Cobweb
{
    protected string $productionTechnology;

    public function __construct(protected int $strength)
    {
    }
}
