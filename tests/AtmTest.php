<?php
namespace Dojo;

use Dojo\Atm;
use PHPUnit_Framework_TestCase;

class AtmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testShoulGiveThirtyReais($input, $output)
    {
        $atm = new Atm;
        $result = $atm->withdraw($input);
        $this->assertSame($output, $result);
    }

    public function scenarios()
    {
        return [
            '30 Reais' => [30, [100 => 0, 50 => 0, 20 => 1, 10 => 1]],
            '50 Reais' => [50, [100 => 0, 50 => 1, 20 => 0, 10 => 0]],
            '80 Reais' => [80, [100 => 0, 50 => 1, 20 => 1, 10 => 1]],
            '100 Reais' => [100, [100 => 1, 50 => 0, 20 => 0, 10 => 0]],
            '150 Reais' => [150, [100 => 1, 50 => 1, 20 => 0, 10 => 0]],
        ];
    }
}
