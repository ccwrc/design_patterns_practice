<?php

declare(strict_types=1);

namespace Patterns\Composite;

/**
 * Leaf
 */
final class OrdinaryVoter extends ElectionsPart
{
    public function getVotingPower(): int
    {
        return $this->votingPower;
    }
}
