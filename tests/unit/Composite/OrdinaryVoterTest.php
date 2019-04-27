<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Composite;

use Patterns\Composite\{ElectionsPart, OrdinaryVoter};

use PHPUnit\Framework\TestCase;

class OrdinaryVoterTest extends TestCase
{
    /**
     * @return OrdinaryVoter
     */
    public function testCreate(): OrdinaryVoter
    {
        $ordinaryVoter = new OrdinaryVoter('ordinary');

        $this->assertInstanceOf(ElectionsPart::class, $ordinaryVoter);

        return $ordinaryVoter;
    }

    /**
     * @depends testCreate
     * @param OrdinaryVoter $ordinaryVoter
     */
    public function testGetVotingPower(OrdinaryVoter $ordinaryVoter): void
    {
        $this->assertSame(1, $ordinaryVoter->getVotingPower());
    }

    /**
     * @depends testCreate
     * @param OrdinaryVoter $ordinaryVoter
     */
    public function testAddElectionsPartException(OrdinaryVoter $ordinaryVoter): void
    {
        $electionsPart = $this->createMock(ElectionsPart::class);

        $this->expectExceptionMessage('Patterns\Composite\OrdinaryVoter is a leaf');
        $ordinaryVoter->addElectionsPart($electionsPart);
    }

}
