<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

class TypedPropertiesTwoZero
{
    /**
     * @var int|null
     */
    public ?int $int;

    public string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }
}
