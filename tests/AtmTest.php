<?php

namespace Dojo;

use PHPUnit_Framework_TestCase;

class AtmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testShouldGiveBillsFor($input, $output)
    {
        $atm = new Atm;
        $result = $atm->withdraw($input);
        $this->assertSame($output, $result);
    }

    public function scenarios()
    {
        return [
            "30 reais" => [30, [100 => 0, 50 => 0, 20 => 1, 10 => 1]],
            "50 reais" => [50, [100 => 0, 50 => 1, 20 => 0, 10 => 0]],
            "80 reais" => [80, [100 => 0, 50 => 1, 20 => 1, 10 => 1]],
            "100 reais" => [100, [100 => 1, 50 => 0, 20 => 0, 10 => 0]],
            "150 reais" => [150, [100 => 1, 50 => 1, 20 => 0, 10 => 0]],
        ];
    }

    /**
     * @dataProvider resourceSum
     */
    public function testShouldSum($result, $arg1, $arg2)
    {
        $atm = new Atm;
        $sum = $atm->sum($arg1, $arg2);
        $this->assertEquals($sum, $result);
    }


    public function resourceSum()
    {
        return [
            'equals 2' => [2, 1, 1],
            'equals 3' => [3, 1, 2],
        ];
    }

    /**
     * @dataProvider resourceSumException
     * @expectedException  \Exception
     */
    public function testShouldSumThrowException($result, $arg1, $arg2)
    {
        $atm = new Atm;
        $sum = $atm->sum($arg1, $arg2);
        $this->assertEquals($sum, $result);
    }


    public function resourceSumException()
    {
        return [
            'equals string 1' => ['string', 'string', 2],
            'equals string 2' => ['string', 1, 'string'],
            'equals boolean' => ['boolean', 1, true],
        ];
    }
}
