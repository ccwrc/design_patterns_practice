<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\other;

use Patterns\ExperimentalFolder\Other\{AtariChristmasTreeContest2022, SendEmailInterface};
use PHPUnit\Framework\TestCase;

class AtariChristmasTreeContest2022Test extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testDrawOne(): void
    {
        $sendEmailInterface = $this->createMock(SendEmailInterface::class);
        $contest = new AtariChristmasTreeContest2022(
            $sendEmailInterface,
            []
        );

        $this->assertIsString($contest->drawOne());
    }
}
