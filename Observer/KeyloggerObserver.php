<?php

declare(strict_types=1);

namespace Patterns\Observer;

use SplSubject;

class KeyloggerObserver implements \SplObserver
{

    /**
     * @param SplSubject $subject
     * @return null|string
     */
    public function update(SplSubject $subject): ?string
    {
        if ($subject instanceof KeyloggerSubject) {
            return 'pass: ' . $subject->getPlainTextPassword() . ' - update the account balance in the bank';
        }
        return null;
    }
}
