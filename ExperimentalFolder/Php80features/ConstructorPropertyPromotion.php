<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php80features;

/**
 * @link https://wiki.php.net/rfc/constructor_promotion docs
 */
class ConstructorPropertyPromotion
{
    public function __construct(
        public int              $int,
        private readonly string $string,
        protected array         $array
    )
    {
    }

    public function addAll(): int
    {
        $arrayFirstValue = $this->array[0] ?? 0;

        if (is_int($arrayFirstValue)) {
            return $arrayFirstValue + $this->int + (int)$this->string;
        }

        return $this->int + (int)$this->string;
    }
}
