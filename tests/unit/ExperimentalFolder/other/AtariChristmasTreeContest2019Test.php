<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\other;

use Patterns\ExperimentalFolder\Other\{AtariChristmasTreeContest2019, SendEmailInterface};

use PHPUnit\Framework\TestCase;

class AtariChristmasTreeContest2019Test extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAndTheWinnerIs(): void
    {
        $sendEmailInterface = $this->createMock(SendEmailInterface::class);
        $contest = new AtariChristmasTreeContest2019(
            $sendEmailInterface,
            [],
            false
        );

        $this->assertContains($contest->andTheWinnerIs(), AtariChristmasTreeContest2019::ATARI_HOTHEADS);
    }
}
