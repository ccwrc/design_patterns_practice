<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\ArraySpreadOperator;
use PHPUnit\Framework\TestCase;

class ArraySpreadOperatorTest extends TestCase
{
    public function testGlueThreeArrays(): void
    {
        $array1 = [1, 2, 3];
        $array2 = [4, 5];
        $array3 = [6];
        $resultArray = [1, 2, 3, 4, 5, 6];

        $this->assertEquals($resultArray, ArraySpreadOperator::glueThreeArrays(
            $array1,
            $array2,
            $array3
        ));

        $this->assertEquals($resultArray, ArraySpreadOperator::glueThreeArraysOldWay(
            $array1,
            $array2,
            $array3
        ));
    }

    /*
     * test skipped: from PHP 8.2 speed differences are negligible
    public function testGlueSpeed(): void
    {
        $array1 = [2, 3, 4];
        $array2 = [5, 6];
        $array3 = [7];
        $numberOfRepetitions = 520;

        $startGlue = \hrtime(true);
        for ($i = 0; $i <= $numberOfRepetitions; $i++) {
            ArraySpreadOperator::glueThreeArrays($array1, $array2, $array3);
        }
        $endGlue = \hrtime(true);

        $startGlueOldWay = \hrtime(true);
        for ($i = 0; $i <= $numberOfRepetitions; $i++) {
            ArraySpreadOperator::glueThreeArraysOldWay($array1, $array2, $array3);
        }
        $endGlueOldWay = \hrtime(true);

        $executionTimeGlue = $endGlue - $startGlue;
        $executionTimeGlueOldWay = $endGlueOldWay - $startGlueOldWay;
        MicroLogger::addLog('glue: ' . $executionTimeGlue);
        MicroLogger::addLog('glueOldWay: ' . $executionTimeGlueOldWay);

        $this->assertGreaterThan($executionTimeGlue, $executionTimeGlueOldWay);
    }
    */
}
