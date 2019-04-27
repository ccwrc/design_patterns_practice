<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Composite;

use Patterns\Composite\{ElectionsPart, OrdinaryVoter, Politician, RichVoter};

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

    /**
     * @depends testCreate
     * @param Politician $politician
     * @return RichVoter
     */
    public function testAddElectionsPart(Politician $politician): RichVoter
    {
        $richVoter = new RichVoter('rich');
        $ordinaryVoter = new OrdinaryVoter('plain');

        $politician->addElectionsPart($richVoter);
        $politician->addElectionsPart($ordinaryVoter);
        $politician->addElectionsPart($ordinaryVoter);

        $this->assertSame(4, $politician->getVotingPower());

        return $richVoter;
    }

    /**
     * @depends testCreate
     * @depends testAddElectionsPart
     * @param Politician $politician
     * @param RichVoter $richVoter
     */
    public function testRemoveElectionsPart(Politician $politician, RichVoter $richVoter): void
    {
        $politician->removeElectionsPart($richVoter);

        $this->assertSame(2, $politician->getVotingPower());
    }
}
