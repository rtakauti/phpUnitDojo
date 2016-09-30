<?php
namespace Dojo;

//require_once 'CsvFileIterator.php';
use Dojo\Atm;
use PHPUnit_Framework_TestCase;

class AtmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testShoulGiveThirtyReais($input, $output)
    {
        $atm = new Atm([100, 50, 20, 10]);
        $result = $atm->withdraw($input);
        $this->assertSame($output, $result);
    }

    public function scenarios()
    {
        //return new CsvFileIterator('C:\Repositorio\laravelsp\src\data.csv');
        var_dump(fgetcsv(fopen('C:\Repositorio\laravelsp\src\data.csv', 'r')));
        return [
            '30 reais' => [30, [20 => 1, 10 => 1]],
            '50 reais' => [50, [50 => 1]],
            '80 reais' => [80, [50 => 1, 20 => 1, 10 => 1]],
        ];
    }
}
