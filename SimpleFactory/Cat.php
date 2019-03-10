<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class Cat implements CatInterface
{
    /**
     * @var bool
     */
    private $fluffy;
    /**
     * @var bool
     */
    private $annoying;

    public function __construct(bool $isFluffy, bool $isAnnoying)
    {
        $this->fluffy = $isFluffy;
        $this->annoying = $isAnnoying;
    }

    /**
     * @return bool
     */
    public function isFluffy(): bool
    {
        return $this->fluffy;
    }

    /**
     * @return bool
     */
    public function isAnnoying(): bool
    {
        return $this->annoying;
    }

    /**
     * @return string
     */
    public function getVoice(): string
    {
        if ($this->annoying) {
            return 'Go fuck yourself men!';
        }
        return 'meow, meow';
    }
}
