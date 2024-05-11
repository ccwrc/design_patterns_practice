<?php

declare(strict_types=1);

namespace Patterns\Prototype;

final class TerminatorT1100 extends TerminatorPrototype
{
    public function getLocation(): int
    {
        return $this->location;
    }

    public function __clone()
    {
        $this->serialNumber = 'T1100 clone';
    }

    public function tryKillSarah(Sarah $sarah): bool
    {
        if ($sarah->isWillToSurvive() === false && $sarah->getLocation() === $this->getLocation()) {
            return $sarah->killSarah($this);
        }

        if ($sarah->isWillToSurvive() === true && $sarah->getLocation() === $this->getLocation()) {
            $probability = rand(1, 9);
            if ($probability === 7) {
                return $sarah->killSarah($this);
            }
        }

        return false;
    }
}
