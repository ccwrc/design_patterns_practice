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
        $reportingCrimeCarjacking = ReportingCrimeFactory::create('Carjacking');
        $reportingCrimeIndecentExposure = ReportingCrimeFactory::create('indecentExposure');
        $reportingCrimeKidnapping = ReportingCrimeFactory::create('kidnappING');
        $reportingCrimeMurder = ReportingCrimeFactory::create('murder');

        $this->assertSame('215', $reportingCrimeCarjacking->getCrimeCode());
        $this->assertSame('314', $reportingCrimeIndecentExposure->getCrimeCode());
        $this->assertSame('207', $reportingCrimeKidnapping->getCrimeCode());
        $this->assertSame('187', $reportingCrimeMurder->getCrimeCode());
    }
}
