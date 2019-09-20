<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php72features;

/**
 * @link https://wiki.php.net/rfc/object-typehint Docs.
 */
class TypehintObject
{
    private $justPlainDate;

    public function __construct(object $dateTime)
    {
        if ($dateTime instanceof \DateTime) {
            $this->justPlainDate = $dateTime;
            return;
        }
        $this->justPlainDate = new \DateTime();
    }
}
