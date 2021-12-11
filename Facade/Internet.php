<?php

declare(strict_types=1);

namespace Patterns\Facade;

final class Internet implements InternetInterface
{
    /**
     * @var string[] links to pictures
     */
    private array $picturesCollection;
    /**
     * @var bool
     */
    private bool $online;

    public function __construct()
    {
        $this->picturesCollection = [];
        $this->online = false;
    }

    /**
     * @return string
     */
    public function connect(): string
    {
        $this->online = true;

        return 'My God, It\'s Full of Stars!';
    }

    /**
     * @return string
     */
    public function disconnect(): string
    {
        $this->online = false;

        return 'I\'ll be back';
    }

    public function isOnline(): bool
    {
        return $this->online;
    }

    /**
     * @link https://images85.fotosik.pl/662/83146eae65906369.jpg valid test link
     *
     * @param string $linkToPicture
     */
    public function addLinkToPicture(string $linkToPicture): void
    {
        if (\filter_var($linkToPicture, FILTER_VALIDATE_URL) !== false
            && $this->doesLinkLeadToPicture($linkToPicture)) {
            $this->picturesCollection[] = $linkToPicture;
        }
    }

    public function howManyPicturesInCollection(): int
    {
        return \count($this->picturesCollection);
    }

    /**
     * @param string $pictureUrl
     *
     * @return bool
     */
    private function doesLinkLeadToPicture(string $pictureUrl): bool
    {
        $headers = \get_headers($pictureUrl, 1);

        return \strpos($headers['content-type'] ?? '', 'image/') !== false;
    }
}
