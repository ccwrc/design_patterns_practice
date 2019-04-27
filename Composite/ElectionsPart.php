<?php

declare(strict_types=1);

namespace Patterns\Composite;

abstract class ElectionsPart
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $votingPower;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->votingPower = 1;
    }

    abstract public function getVotingPower(): int;

    /**
     * @param ElectionsPart $electionsPart
     * @throws \DomainException
     */
    public function addElectionsPart(ElectionsPart $electionsPart): void
    {
        throw new \DomainException(\get_class($this) . ' is a leaf');
    }

    /**
     * @param ElectionsPart $electionsPart
     * @throws \DomainException
     */
    public function removeElectionsPart(ElectionsPart $electionsPart): void
    {
        throw new \DomainException(\get_class($this) . ' is a leaf');
    }
}
