<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory\Product;

use Patterns\AbstractFactory\Cobweb;

final class PlainSpiderCobweb extends Cobweb
{
    public function __construct(int $strength)
    {
        parent::__construct($strength);
        $this->productionTechnology = 'Biological';
    }
}
