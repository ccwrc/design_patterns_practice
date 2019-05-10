<?php

declare(strict_types=1);

namespace Patterns\Command;

class Soldier
{
    /**
     * @var string
     */
    private $rank;
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $isDead;
    /**
     * @var int 
     */
    private $calories;

    public function __construct(string $rank, string $name)
    {
        $this->rank = $rank;
        $this->name = $name;
        $this->isDead = false;
        $this->calories = 10;
    }

}
