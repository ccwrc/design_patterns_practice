<?php

declare(strict_types=1);

namespace Patterns\Observer;

class PlainSpyObserver implements \SplObserver
{
    /**
     * @var \SplSubject[]
     */
    private array $subjects = [];

    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject): void
    {
        $this->subjects[] = clone $subject;
    }

    /**
     * @return \SplSubject[]
     */
    public function getSubjects(): array
    {
        return $this->subjects;
    }
}
