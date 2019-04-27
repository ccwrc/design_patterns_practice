<?php

declare(strict_types=1);

namespace Patterns\Composite;

abstract class Elections
{
    /**
     * @var string|null
     */
    protected $politicalClan;
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
        $this->politicalClan = null;
        $this->name = $name;
        $this->votingPower = 1;
    }

    abstract public function getVotingPower(): int;

}
