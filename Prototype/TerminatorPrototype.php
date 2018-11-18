<?php

declare(strict_types=1);

namespace Patterns\Prototype;

abstract class TerminatorPrototype implements Location
{
    /**
     * @var int
     */
    protected $location;

    public function __construct(int $locationOfTeleportation)
    {
        $this->location = $locationOfTeleportation;
    }

    /**
     * @param Sarah $sarah
     * @return bool
     */
    abstract public function tryKillSarah(Sarah $sarah): bool;
}
