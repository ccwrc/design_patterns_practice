<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\TypedPropertiesTwoZero;

use PHPUnit\Framework\TestCase;

class TypedPropertiesTwoZeroTest extends TestCase
{
    public function testCreate(): TypedPropertiesTwoZero
    {
        $twoZero = new TypedPropertiesTwoZero('plain string');

        $this->assertInstanceOf(TypedPropertiesTwoZero::class, $twoZero);

        return $twoZero;
    }

    /**
     * @depends testCreate
     * @param TypedPropertiesTwoZero $twoZero
     */
    public function testTypedString(TypedPropertiesTwoZero $twoZero): void
    {
        $int = 11;

        $this->expectException(\TypeError::class);
        $twoZero->string = $int;
    }

    /**
     * @depends testCreate
     * @param TypedPropertiesTwoZero $twoZero
     */
    public function testTypedInt(TypedPropertiesTwoZero $twoZero): void
    {
        $int = 11;
        $null = null;
        $string = 'extraordinary string';

        $twoZero->int = $int;
        $this->assertEquals($int, $twoZero->int);

        $twoZero->int = $null;
        $this->assertEquals($null, $twoZero->int);

        $this->expectException(\TypeError::class);
        $twoZero->int = $string;
    }
}
