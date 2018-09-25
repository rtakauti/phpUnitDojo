<?php

namespace Dojo;

class Atm
{
    private $availableBills;
    private $billCount;

    public function withdraw($withdraw)
    {
        $this->availableBills = [100, 50, 20, 10];
        $this->billCount = [
            100 => 0,
            50 => 0,
            20 => 0,
            10 => 0,
        ];
        $index = 0;
        while ($withdraw > 0) {
            if (($withdraw - $this->availableBills[$index]) >= 0) {
                $withdraw -= $this->availableBills[$index];
                $this->billCount[$this->availableBills[$index]]++;
            } else {
                $index++;
            }
        }

        return $this->billCount;
    }

    public function sum($num1, $num2)
    {
        if (!is_numeric($num1) || !is_numeric($num2)) {
            throw new \Exception('Bad argument');
        }

        return $num1 + $num2;
    }
}
