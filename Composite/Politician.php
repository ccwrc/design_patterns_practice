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
    private array $electionsParts;

    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->electionsParts = [];
    }

    /**
     * @inheritDoc
     */
    public function addElectionsPart(ElectionsPart $electionsPart): void
    {
        if (\in_array($electionsPart, $this->electionsParts, true)) {

            return;
        }
        $this->electionsParts[] = $electionsPart;
    }


    /**
     * @inheritDoc
     */
    public function removeElectionsPart(ElectionsPart $electionsPart): void
    {
        $index = \array_search($electionsPart, $this->electionsParts, true);
        if (\is_int($index)) {
            \array_splice($this->electionsParts, $index, 1, []);
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
