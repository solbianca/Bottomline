<?php

namespace Bottomline;

if (version_compare(PHP_VERSION, '5.6.0', '=<')) {
    throw new Exception('Your PHP installation is too old. Bottomline requires at least PHP 5.6.0', 1);
}

class Loader
{
    private static $actions = [
        'now' => '\Bottomline\DateTime',
        'stop' => '\Bottomline\Dumper',
        'd' => '\Bottomline\Dumper',
        'dd' => '\Bottomline\Dumper',
        'p' => '\Bottomline\Dumper',
        'pp' => '\Bottomline\Dumper',
        'ds' => '\Bottomline\Dumper',
        'dsd' => '\Bottomline\Dumper',
        'dmem' => '\Bottomline\Dumper',
        'dtimer' => '\Bottomline\Dumper',
        'dtrace' => '\Bottomline\Dumper',
        'append' => '\Bottomline\Arrays',
        'isArray' => '\Bottomline\Objects',
        'isFunction' => '\Bottomline\Objects',
        'isNull' => '\Bottomline\Objects',
        'isNumber' => '\Bottomline\Objects',
        'isObject' => '\Bottomline\Objects',
        'isString' => '\Bottomline\Objects',
        'get' => 'Bottomline\Collections',
    ];

    public static function __callStatic($name, $arguments = [])
    {
        return self::load($name, $arguments);
    }

    private static function load($name, $arguments)
    {
        if (isset(self::$actions[$name])) {
            return call_user_func_array([self::$actions[$name], $name], $arguments);
        }
    }
}