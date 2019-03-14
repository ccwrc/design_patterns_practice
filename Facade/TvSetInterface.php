<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface TvSetInterface
{
    /**
     * @return string
     */
    public function turnOnTvSet(): string;

    /**
     * @return string
     */
    public function disableTvSet(): string;
}
