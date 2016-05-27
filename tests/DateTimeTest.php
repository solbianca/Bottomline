<?php

require(__DIR__ . '/../vendor/autoload.php');

class DateTimeTest extends PHPUnit_Framework_TestCase
{
    public function testNow()
    {
        $time1 = __::now();
        $time2 = time();

        $this->assertEquals($time1, $time2);

    }
}