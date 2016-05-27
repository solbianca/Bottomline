<?php

require(__DIR__ . '/../vendor/autoload.php');

class ArraysTest extends PHPUnit_Framework_TestCase
{
    public function testAppend()
    {
        $array = [1, 2, 3];
        $newArray = __::append($array, 4);
        $this->assertEquals([1, 2, 3, 4], $newArray);
    }
}