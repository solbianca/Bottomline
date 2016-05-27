<?php

require __DIR__ . '/src/Bottomline/Loader.php';

/**
 * Globally namespaced version of the class.
 *
 * @method int now() Return current Unix timestamp
 */
class Bottomline extends \Bottomline\Loader
{

}

/**
 * Class __
 *
 * @method int now() Return current Unix timestamp
 */
class __
{
    public static function __callStatic($name, array $arguments = [])
    {
        return call_user_func_array(['Bottomline', $name], $arguments);
    }
}
