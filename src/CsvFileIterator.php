<?php
namespace Dojo;

class CsvFileIterator implements \Iterator
{
    protected $file;
    protected $key = 0;
    protected $current;

    public function __construct($file)
    {
        $this->file = fopen($file, 'r');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function rewind()
    {
        rewind($this->file);
        $csv = fgetcsv($this->file);
        $title = array_shift($csv);
        $key = [];
        $value = [];
        for ($i = 0; $i < count($csv); $i++) {
            ($i % 2 === 0) ? $key[] = $csv[$i] : $value[] = (int)$csv[$i];
        }
        $sub = array_combine($key, $value);
        $this->current =  [$title, $sub];
        $this->key = 0;
    }

    public function valid()
    {
        return !feof($this->file);
    }

    public function key()
    {
        return $this->key;
    }

    public function current()
    {
        return $this->current;
    }

    public function next()
    {
        $csv = fgetcsv($this->file);
        $title = array_shift($csv);
        $key = [];
        $value = [];
        for ($i = 0; $i < count($csv); $i++) {
            ($i % 2 === 0) ? $key[] = $csv[$i] : $value[] = (int)$csv[$i];
        }
        $sub = array_combine($key, $value);
        $this->current =  [$title, $sub];
        $this->key++;
    }
}
