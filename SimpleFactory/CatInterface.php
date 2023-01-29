<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

interface CatInterface
{
    public function isFluffy(): bool;

    public function isAnnoying(): bool;

    public function getVoice(): string;
}
