<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Strategy;

use Patterns\Strategy\{PatternInterface\CrimeType, PoliceProcedures\OtherCrime, ReportingCrime};
use PHPUnit\Framework\TestCase;

class ReportingCrimeTest extends TestCase
{
    public function testCreate(): void
    {
        $reportingCrime = new ReportingCrime($this->createMock(CrimeType::class));

        $this->assertInstanceOf(ReportingCrime::class, $reportingCrime);
        $this->assertInstanceOf(\DateTime::class, $reportingCrime->getNotificationTimeOfCrime());
    }

    public function testGetCrimeCode(): void
    {
        $otherCrime = new OtherCrime();
        $reportingCrime = new ReportingCrime($otherCrime);

        $this->assertSame('XXX', $reportingCrime->getCrimeCode());
    }
}
