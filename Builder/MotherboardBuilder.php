<?php

declare(strict_types=1);

namespace Patterns\Builder;

interface MotherboardBuilder
{
    public function createPcb(): void;

    public function addLan(): void;

    public function addAudioCard(): void;

    /**
     * @link https://stackoverflow.com/questions/39068983/php-7-interfaces-return-type-hinting-and-self
     *
     * @return MotherboardBuilder
     */
    public function getMotherboard(): self;
}
