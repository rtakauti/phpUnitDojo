<?php
namespace Dojo;

class Atm
{
    private $availableBills;
    private $billCount;
    private $index = 0;

    public function __construct($bills)
    {
        $this->availableBills = $bills;
        $this->billCount = array_fill_keys($this->availableBills, 0);
    }

    public function withdraw($withdraw)
    {
        while ($withdraw > 0) {
            if (($withdraw - $this->availableBills[$this->index]) >= 0) {
                $withdraw -= $this->availableBills[$this->index];
                $this->billCount[$this->availableBills[$this->index]]++;
            } else {
                $this->index++;
            }

            if ($this->billCount[$this->availableBills[$this->index]] != 0) {
                $result[$this->availableBills[$this->index]] = $this->billCount[$this->availableBills[$this->index]];
            }
        }

        return $result;
    }
}
