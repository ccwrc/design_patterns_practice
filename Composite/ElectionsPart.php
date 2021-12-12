<?php

declare(strict_types=1);

namespace Patterns\Composite;

abstract class ElectionsPart
{
    protected string $name;

    protected int $votingPower;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->votingPower = 1;
    }

    abstract public function getVotingPower(): int;

    /**
     * @param ElectionsPart $electionsPart
     *
     * @throws  \DomainException
     */
    public function addElectionsPart(ElectionsPart $electionsPart): void
    {
        $reflect = new \ReflectionClass($this);

        throw new \DomainException($reflect->getShortName() . ' is a leaf');
    }

    /**
     * @param ElectionsPart $electionsPart
     *
     * @throws \DomainException
     */
    public function removeElectionsPart(ElectionsPart $electionsPart): void
    {
        $reflect = new \ReflectionClass($this);

        throw new \DomainException($reflect->getShortName() . ' is a leaf');
    }
}
