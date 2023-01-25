<?php

declare(strict_types=1);

namespace Patterns\LazyLoading;

class GetMudService
{
    public const DEFAULT_MUD_VALUE = 2;

    public function get(bool $aLot = false): int
    {
        if (false === $aLot) {
            return self::DEFAULT_MUD_VALUE;
        }

        return $this->getLotMud();
    }

    private function getLotMud(): int
    {
        $bigBallOfMud = $this->initBigBallOfMud();

        return $bigBallOfMud->get()->throwMud();
    }

    private function initBigBallOfMud(): BigBallOfMudInterface
    {
        return (new class() implements BigBallOfMudInterface {
            public function get(int $weight = self::MIN_WEIGHT): BallOfMud
            {
                return new class($weight) extends BallOfMud {
                };
            }
        });
    }
}
