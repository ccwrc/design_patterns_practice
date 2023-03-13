<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\DisjunctiveNormalForm;
use PHPUnit\Framework\TestCase;

class DisjunctiveNormalFormTest extends TestCase
{
    public function testGiveBack(): void
    {
        $this->assertNull(DisjunctiveNormalForm::giveBack(null));
    }
}
