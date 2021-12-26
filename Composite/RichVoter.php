<?php

declare(strict_types=1);

namespace Patterns\Composite;

/**
 * Leaf
 */
final class RichVoter extends ElectionsPart
{
    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->votingPower = 2;
    }

    public function getVotingPower(): int
    {
        return $this->votingPower;
    }
}
