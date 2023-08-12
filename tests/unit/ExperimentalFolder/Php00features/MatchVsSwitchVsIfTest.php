<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php00features;

use Patterns\ExperimentalFolder\Php00features\MatchVsSwitchVsIf;
use PHPUnit\Framework\TestCase;

class MatchVsSwitchVsIfTest extends TestCase
{
    public function testFunWitchMatch(): void
    {
        $this->assertSame(MatchVsSwitchVsIf::RESULT_STRICT, MatchVsSwitchVsIf::funWitchMatch());
    }

    public function testFunWitchSwitch(): void
    {
        $this->assertSame(MatchVsSwitchVsIf::RESULT_LOOSE, MatchVsSwitchVsIf::funWitchSwitch());
    }

    public function testFunWitchIf(): void
    {
        $this->assertSame(MatchVsSwitchVsIf::RESULT_STRICT, MatchVsSwitchVsIf::funWitchIf());
    }
}
