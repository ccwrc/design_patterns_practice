<?php

declare(strict_types=1);

namespace Patterns\Observer;

use SplSubject;

class PlainSpyObserver implements \SplObserver
{
    /**
     * @param SplSubject $subject
     * @return string
     */
    public function update(SplSubject $subject): string
    {
        return 'Update something.';
    }
}
