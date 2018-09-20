<?php

namespace Dojo;

class Atm
{
    private $billCount;
    private $index = 0;

    public function __construct(...$bills)
    {
        $this->billCount = array_fill_keys((array)$bills, 0);
    }

    public function withdraw($withdraw)
    {
        if ($withdraw !== null && !is_integer($withdraw)) {
            return gettype($withdraw);
        }

        while ($withdraw > 0) {
            if (($withdraw - array_keys($this->billCount)[$this->index]) < 0) {
                $this->index++;
                continue;
            }

            $withdraw -= array_keys($this->billCount)[$this->index];
            ++$this->billCount[$this->index];
        }

        return array_filter($this->billCount);
    }
}
