<?php

declare(strict_types=1);

namespace Patterns\Prototype;

use Ramsey\Uuid\Uuid;

abstract class TerminatorPrototype implements Location
{
    /**
     * @var int
     */
    protected $location;

    /**
     * @var null|Uuid
     */
    protected $serialNumber;

    public function __construct(int $locationOfTeleportation)
    {
        $this->location = $locationOfTeleportation;
    }

    /**
     * @param Sarah $sarah
     * @return bool
     */
    abstract public function tryKillSarah(Sarah $sarah): bool;

    public function setSerialNumber(): bool
    {
        try {
            $this->serialNumber = Uuid::uuid4();
            return true;
        } catch (\Throwable $throwable) {
            return false;
        }
    }

    /**
     * @return null|Uuid
     */
    public function getSerialNumber(): ?string
    {
        return $this->serialNumber->toString();
    }
}
