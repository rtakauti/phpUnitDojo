<?php

namespace Dojo;

//require_once 'CsvFileIterator.php';
use PHPUnit_Framework_TestCase;

class AtmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testShoulGiveMaximumBillValueInReais($input, $output)
    {
        $atm = new Atm(100, 50, 20, 10, 5);
        $result = $atm->withdraw($input);
        $this->assertSame($output, $result);
    }

    public function scenarios()
    {
        return new CsvFileIterator(__DIR__ . DIRECTORY_SEPARATOR . 'data.csv');

        $handler = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'data.csv', 'r');
        $csv = fgetcsv($handler);
        $title = array_shift($csv);
        $result = [];
        $key = [];
        $value = [];
        $count = count($csv);
        for ($i = 0; $i < $count; $i++) {
            ($i % 2 === 0) ? $key[] = $csv[$i] : $value[] = (int)$csv[$i];
        }

        $sub = array_combine($key, $value);
        $result[$title . ' Reais'] = [$title, $sub];
        fclose($handler);
        return $result;

        return [
            '30 reais' => [30, [20 => 1, 10 => 1]],
            '50 reais' => [50, [50 => 1]],
            '80 reais' => [80, [50 => 1, 20 => 1, 10 => 1]],
        ];
    }
}
