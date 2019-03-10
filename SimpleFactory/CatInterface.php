<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

interface CatInterface
{
    /**
     * @return bool
     */
    public function isFluffy(): bool;

    /**
     * @return bool
     */
    public function isAnnoying(): bool;

    /**
     * @return string
     */
    public function getVoice(): string;
}
