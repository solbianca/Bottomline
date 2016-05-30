<?php

namespace Underscore;

class Objects
{
    /**
     * Finds whether a variable is an array
     *
     * @param $argument
     * @return bool
     */
    public static function isArray($argument)
    {
        return is_array($argument);
    }

    /**
     * Verify that the contents of a variable can be called as a function
     *
     * @param $argument
     * @return bool
     */
    public static function isFunction($argument)
    {
        return is_callable($argument);
    }

    /**
     * Finds whether a variable is null
     *
     * @param $argument
     * @return bool
     */
    public static function isNull($argument)
    {
        return is_null($argument);
    }

    /**
     * Finds whether a variable is a number or a numeric string
     *
     * @param $argument
     * @return bool
     */
    public static function isNumber($argument)
    {
        return is_numeric($argument);
    }

    /**
     * Finds whether a variable is an object
     *
     * @param $argument
     * @return bool
     */
    public static function isObject($argument)
    {
        return is_object($argument);
    }

    /**
     * Find whether the type of a variable is string
     *
     * @param $argument
     * @return bool
     */
    public static function isString($argument)
    {
        return is_string($argument);
    }
}