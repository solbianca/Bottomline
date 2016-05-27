<?php

require(__DIR__ . '/../vendor/autoload.php');

class ObjectsTest extends PHPUnit_Framework_TestCase
{
    public function testIsArray()
    {
        $array = [1, 2, 3];
        $this->assertEquals(__::isArray($array), true);
    }

    public function testIsFunction()
    {
        $function = function ($a) {
            $a + 1;
        };
        $result = __::isFunction($function);

        $this->assertEquals($result, true);
    }

    public function testIsNull()
    {
        $null = null;
        $this->assertEquals(__::isNull($null), true);

        $notNull = 'null';
        $result = __::isNull($notNull);
        $this->assertEquals($result, false);
    }

    public function testIsNumber()
    {
        $num1 = 12.34;
        $num2 = 1;
        $num3 = '1';
        $num4 = '01';
        $num5 = 'a1';
        $num6 = true;
        $num7 = '1a';


        $this->assertEquals(__::isNumber($num1), true);
        $this->assertEquals(__::isNumber($num2), true);
        $this->assertEquals(__::isNumber($num3), true);
        $this->assertEquals(__::isNumber($num4), true);
        $this->assertEquals(__::isNumber($num5), false);
        $this->assertEquals(__::isNumber($num6), false);
        $this->assertEquals(__::isNumber($num7), false);
    }

    public function testIsObject()
    {
        $object = new stdClass();
        $this->assertEquals(__::isObject($object), true);

        $notObject = '1';
        $this->assertEquals(__::isObject($notObject), false);
    }

    public function testIsString()
    {
        $str1 = '1';
        $str2 = 'a';
        $str3 = ' ';
        $str4 = 'false';
        $str5 = 1;
        $str6 = null;
        $str7 = true;

        $this->assertEquals(__::isString($str1), true);
        $this->assertEquals(__::isString($str2), true);
        $this->assertEquals(__::isString($str3), true);
        $this->assertEquals(__::isString($str4), true);
        $this->assertEquals(__::isString($str5), false);
        $this->assertEquals(__::isString($str6), false);
        $this->assertEquals(__::isString($str7), false);
    }
}