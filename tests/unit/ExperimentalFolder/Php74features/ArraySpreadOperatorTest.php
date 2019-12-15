<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\MicroLogger;
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

    public function testErrorGlueThreeArrays(): void
    {
        $array1 = ['one' => 1];
        $array2 = ['two' => 2];
        $array3 = ['three' => 3];

        $this->expectException(\Error::class);
        ArraySpreadOperator::glueThreeArrays(
            $array1,
            $array2,
            $array3
        );
    }

    public function testGlueSpeed(): void
    {
        $array1 = [1, 2, 3];
        $array2 = [4, 5];
        $array3 = [6];
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

        $productionTimeGlue = $endGlue - $startGlue;
        $productionTimeGlueOldWay = $endGlueOldWay - $startGlueOldWay;
        MicroLogger::addLog('glue: ' . $productionTimeGlue);
        MicroLogger::addLog('glueOldWay: ' . $productionTimeGlueOldWay);

        $this->assertGreaterThan($productionTimeGlue, $productionTimeGlueOldWay);
    }
}
