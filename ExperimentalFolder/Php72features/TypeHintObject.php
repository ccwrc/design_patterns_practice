<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php72features;

/**
 * @link https://wiki.php.net/rfc/object-typehint Docs.
 */
class TypeHintObject
{
    /**
     * @var \DateTime
     */
    private $justPlainDate;

    public function __construct(object $dateTime)
    {
        if ($dateTime instanceof \DateTime) {
            $this->justPlainDate = $dateTime;
            return;
        }
        $this->justPlainDate = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getJustPlainDate(): object
    {
        return $this->justPlainDate;
    }
}
