<?php

namespace Dojo;

class Atm
{
    private $availableBills;
    private $billCount;
    private $index = 0;

    public function __construct(...$bills)
    {
        $this->availableBills = (array)$bills;
        $this->billCount = array_fill_keys($this->availableBills, 0);
    }

    public function withdraw($withdraw)
    {
        if ($withdraw !== null && !is_integer($withdraw)) {
            return gettype($withdraw);
        }

        while ($withdraw > 0) {
            if (($withdraw - $this->availableBills[$this->index]) < 0) {
                $this->index++;
                continue;
            }

            $withdraw -= $this->availableBills[$this->index];
            ++$this->billCount[$this->availableBills[$this->index]];
        }

        return array_filter($this->billCount);
    }
}
