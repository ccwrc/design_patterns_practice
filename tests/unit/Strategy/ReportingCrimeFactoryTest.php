<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Strategy;

use Patterns\Strategy\{ReportingCrime, ReportingCrimeFactory};

use PHPUnit\Framework\TestCase;

class ReportingCrimeFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $randNumber = \rand(1, 300);
            $randomString = 'string ' . $randNumber;

            $reportingCrime = ReportingCrimeFactory::create($randomString);
            $this->assertInstanceOf(ReportingCrime::class, $reportingCrime);
            $this->assertSame('XXX', $reportingCrime->getCrimeCode());
        }
    }

    public function testGetRightCode(): void
    {
        $reportingCrimeCarjacking = ReportingCrimeFactory::create(ReportingCrimeFactory::CARJACKING);
        $this->assertSame('215', $reportingCrimeCarjacking->getCrimeCode());

        $reportingCrimeIndecentExposure = ReportingCrimeFactory::create('indecentExposure');
        $this->assertSame('314', $reportingCrimeIndecentExposure->getCrimeCode());

        $reportingCrimeKidnapping = ReportingCrimeFactory::create('kidnappING');
        $this->assertSame('207', $reportingCrimeKidnapping->getCrimeCode());

        $reportingCrimeMurder = ReportingCrimeFactory::create(ReportingCrimeFactory::MURDER);
        $this->assertSame('187', $reportingCrimeMurder->getCrimeCode());
    }
}
