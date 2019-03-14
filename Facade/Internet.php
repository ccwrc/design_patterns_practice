<?php

declare(strict_types=1);

namespace Patterns\Facade;

class Internet implements InternetInterface
{
    /**
     * @var string[] links to pictures
     */
    private $picturesCollection;

    public function __construct()
    {
        $this->picturesCollection = [];
    }

    /**
     * @return string
     */
    public function connect(): string
    {
        return 'My God, It\'s Full of Stars!';
    }

    /**
     * @return string
     */
    public function disconnect(): string
    {
        return 'I\'ll be back';
    }
    
    public function addLinkToPicture(string $linkToPicture): void
    {
        if (\filter_var($linkToPicture, FILTER_VALIDATE_URL) === true) {
            $this->picturesCollection[] = $linkToPicture;
        }
    }
}
