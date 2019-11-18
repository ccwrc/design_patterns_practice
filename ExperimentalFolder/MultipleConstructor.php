<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

class MultipleConstructor
{
    public const DEFAULT_CONTENT = 'default';
    /**
     * @var string
     */
    private $content;

    function __construct()
    {
        $this->content = self::DEFAULT_CONTENT;

        if (\method_exists($this, $function='__construct' . \func_num_args())) {
            \call_user_func_array([$this, $function], \func_get_args());
        }
    }

    private function __construct1(string $content) {
        $this->content = $content;
    }

    private function __construct2(string $content, bool $isContentImportant) {
        $content = $isContentImportant ? \strtoupper($content) : $content;

        $this->__construct1($content);
    }

    private function __construct3(string $content, bool $isContentImportant, int $markerToContent) {
        $content .= $markerToContent;

        $this->__construct2($content, $isContentImportant);
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
