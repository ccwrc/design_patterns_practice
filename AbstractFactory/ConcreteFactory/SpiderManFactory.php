<?php

declare(strict_types=1);

namespace Patterns\AbstractFactory\ConcreteFactory;

use Patterns\AbstractFactory\{Cobweb, Product\SpiderManCobweb, SpiderFactory};

final class SpiderManFactory extends SpiderFactory
{
    /**
     * @param int $strength
     * @return Cobweb
     */
    public function makeWeb(int $strength): Cobweb
    {
        return new SpiderManCobweb($strength);
    }

    /**
     * @link http://php.net/manual/en/migration56.new-features.php splat operator
     * @link http://itcraftsman.pl/co-nowego-w-php-5-6/ splat operator examples
     * @param string ...$criminals
     * @return string[]
     */
    public function catchCriminals(string ...$criminals): array
    {
        $caughtCriminals = [];

        foreach ($criminals as $criminal) {
            $isCaught = (bool)\rand(0, 1);
            if ($isCaught) {
                $caughtCriminals[] = $criminal;
            }
        }

        return $caughtCriminals;
    }
}
