<?php

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
        $null1 = null;
        $null2 = 'null';
        $null3 = 0;
        $null4 = [];
        $null5 = '';

        $this->assertEquals(__::isNull($null1), true);
        $this->assertEquals(__::isNull($null2), false);
        $this->assertEquals(__::isNull($null3), false);
        $this->assertEquals(__::isNull($null4), false);
        $this->assertEquals(__::isNull($null5), false);
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

    public function testGetType()
    {
        $var1 = 1;
        $var2 = '1';
        $var3 = true;
        $var4 = null;
        $var5 = 'false';
        $var6 = [];
        $var7 = '';
        $var8 = STDIN;
        $var9 = new stdClass;
        $var10 = 1.0;
    }
}