<?php

namespace Underscore;

if (version_compare(PHP_VERSION, '5.6.0', '=<')) {
    throw new \Exception('Your PHP installation is too old. Underscore requires at least PHP 5.6.0', 1);
}

/**
 * Class Loader
 * @package Underscore
 *
 */
class Loader
{
    private static $actions = [
        // DateTime
        'now' => '\Underscore\DateTime',
        // Dumper
        'stop' => '\Underscore\Dumper',
        'd' => '\Underscore\Dumper',
        'dd' => '\Underscore\Dumper',
        'p' => '\Underscore\Dumper',
        'pp' => '\Underscore\Dumper',
        'ds' => '\Underscore\Dumper',
        'dsd' => '\Underscore\Dumper',
        'mem' => '\Underscore\Dumper',
        'timer' => '\Underscore\Dumper',
        'trace' => '\Underscore\Dumper',
        // Arrays
        'append' => '\Underscore\Arrays',
        'compact' => '\Underscore\Arrays',
        'flatten' => '\Underscore\Arrays',
        'patch' => '\Underscore\Arrays',
        'prepend' => '\Underscore\Arrays',
        'range' => '\Underscore\Arrays',
        'repeat' => '\Underscore\Arrays',
        // Objects
        'isArray' => '\Underscore\Objects',
        'isFunction' => '\Underscore\Objects',
        'isNull' => '\Underscore\Objects',
        'isNumber' => '\Underscore\Objects',
        'isObject' => '\Underscore\Objects',
        'isString' => '\Underscore\Objects',
        'typeOf' => '\Underscore\Objects',
        // Collections
        'filter' => 'Underscore\Collections',
        'first' => 'Underscore\Collections',
        'get' => 'Underscore\Collections',
        'last' => 'Underscore\Collections',
        'map' => 'Underscore\Collections',
        'max' => 'Underscore\Collections',
        'min' => 'Underscore\Collections',
        'pluck' => 'Underscore\Collections',
        'where' => 'Underscore\Collections',
        //UUID
        'uuidv3' => 'Underscore\UUID',
        'uuidv4' => 'Underscore\UUID',
        'uuidv5' => 'Underscore\UUID',
    ];

    public static function __callStatic($name, $arguments = [])
    {
        return self::load($name, $arguments);
    }

    private static function load($name, $arguments = [])
    {
        if (isset(self::$actions[$name])) {
            return call_user_func_array([self::$actions[$name], $name], $arguments);
        }

        throw new \BadMethodCallException("Call to undefined method: {$name}()");
    }
}