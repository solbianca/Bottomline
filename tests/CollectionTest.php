<?php

//require_once('../bootstrap.php');

class CollectionTest extends PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $array = ['foo' => ['bar' => 'ololo']];
        $result = __::get($array, 'foo.bar');
        $this->assertEquals('ololo', $result);
    }
}