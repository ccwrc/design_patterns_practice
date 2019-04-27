<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Composite;

use Patterns\Composite\{ElectionsPart, Politician};

use PHPUnit\Framework\TestCase;

class PoliticianTest extends TestCase
{
    /**
     * @return Politician
     */
    public function testCreate(): Politician
    {
        $politician = new Politician('liar');

        $this->assertInstanceOf(ElectionsPart::class, $politician);

        return $politician;
    }

}
