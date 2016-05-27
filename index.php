<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require(__DIR__ . '/vendor/autoload.php');

use __;

//use Bottomline\Utilities\DateTime;
//
//echo DateTime::now();

//use __;
$func = function ($a) {
    $a + 1;
};
var_dump(__::isNumber(12.34));

//Bottomline::test();
//var_dump(__::now());
//var_dump(Bottomline::now());
//var_dump(call_user_func_array(['\Bottomline\Utilities\DateTime', 'now'], $arguments = []));

/**
 * Class A
 *
 * show off @method
 *
 * @method int now() Olo
 */




