<?php

declare(strict_types=1);

namespace Patterns\Composite;

/**
 * Composite
 */
final class Politician extends ElectionsPart
{
    /**
     * @var ElectionsPart[]
     */
    private $electionsParts;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->electionsParts = [];
    }

    /**
     * @param ElectionsPart $electionsPart
     */
    public function addElectionsPart(ElectionsPart $electionsPart): void
    {
        if (\in_array($electionsPart, $this->electionsParts, true)) {
            return;
        }
        $this->electionsParts[] = $electionsPart;
    }


    /**
     * @param ElectionsPart $electionsPart
     */
    public function removeElectionsPart(ElectionsPart $electionsPart): void
    {
        $id = \array_search($electionsPart, $this->electionsParts, true);
        if (\is_int($id)) {
            \array_splice($this->electionsParts, $id, 1, []);
        }
    }

    public function getVotingPower(): int
    {
        $sumOfVotingPower = $this->votingPower;
        foreach ($this->electionsParts as $electionsPart) {
            $sumOfVotingPower += $electionsPart->getVotingPower();
        }
        return $sumOfVotingPower;
    }
}
