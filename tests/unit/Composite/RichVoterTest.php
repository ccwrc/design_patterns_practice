<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Composite;

use Patterns\Composite\{ElectionsPart, RichVoter};

use PHPUnit\Framework\TestCase;

class RichVoterTest extends TestCase
{
    /**
     * @return RichVoter
     */
    public function testCreate(): RichVoter
    {
        $richVoter = new RichVoter('rich');

        $this->assertInstanceOf(ElectionsPart::class, $richVoter);

        return $richVoter;
    }

    /**
     * @depends testCreate
     * @param RichVoter $richVoter
     */
    public function testGetVotingPower(RichVoter $richVoter): void
    {
        $this->assertSame(2, $richVoter->getVotingPower());
    }

    /**
     * @depends testCreate
     * @param RichVoter $richVoter
     * @throws \ReflectionException
     */
    public function testRemoveElectionsPart(RichVoter $richVoter): void
    {
        $electionsPart = $this->createMock(ElectionsPart::class);

        $this->expectException(\DomainException::class);
        $richVoter->removeElectionsPart($electionsPart);
    }
}
