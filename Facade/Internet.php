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

    /**
     * @link https://images85.fotosik.pl/662/83146eae65906369.jpg valid test link
     * @param string $linkToPicture
     */
    public function addLinkToPicture(string $linkToPicture): void
    {
        if (\filter_var($linkToPicture, FILTER_VALIDATE_URL) === true
            && self::doesLinkLeadToPicture($linkToPicture)) {
            $this->picturesCollection[] = $linkToPicture;
        }
    }

    public function howManyPicturesInCollection(): int
    {
        return \count($this->picturesCollection);
    }

    /**
     * @param string $pictureUrl
     * @return bool
     */
    private function doesLinkLeadToPicture(string $pictureUrl): bool
    {
        $headers = \get_headers($pictureUrl, 1);
        if (\strpos($headers['Content-Type'], 'image/') !== false) {
            return true;
        }
        return false;
    }
}
