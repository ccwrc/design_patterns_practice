<?php

declare(strict_types=1);

namespace Patterns\Prototype;

final class TerminatorT750 extends TerminatorPrototype
{
    public function getLocation(): int
    {
        return $this->location;
    }

    public function __clone()
    {
        $this->serialNumber = 'T750 clone';
    }

    public function tryKillSarah(Sarah $sarah): bool
    {
        if ($sarah->isWillToSurvive() === false && $sarah->getLocation() === $this->getLocation()) {
            return $sarah->killSarah($this);
        }

        if ($sarah->isWillToSurvive() === true && $sarah->getLocation() === $this->getLocation()) {
            $probability = rand(1, 40);
            if ($probability === 7) {
                return $sarah->killSarah($this);
            }
        }

        return false;
    }
}
