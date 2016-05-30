<?php

require __DIR__ . '/src/Underscore/Loader.php';

/**
 * Class Underscore
 * Globally namespaced version of the class.
 *
 * DateTime Functions
 * @method static int now() Return current Unix timestamp
 *
 * Dumper Functions
 * @method static stop() Output a message and terminate the current script
 * @method static d(...$arguments) Simple variable dump
 * @method static dd(...$arguments) Dump variable and die
 * @method static p(...$arguments) Simple print variable
 * @method static pp(...$arguments) Print variable and die
 * @method static ds(...$arguments) Dump variable as string
 * @method static dsd(...$arguments) Dump variable as string and die
 * @method static mem() Print peak memory usage
 * @method static timer() Measure execution time
 * @method static trace() Backtrace
 *
 * Objects Functions
 *
 * Collections Functions
 * @method static array filter(array $array = [], Closure $closure) Returns the values in the collection that pass the truth test.
 * @method static array|mixed first(array $array, integer $take = null) Gets the first element of an array.
 * Passing n returns the first n elements.
 * @method static array|mixed|null get(array $collection = [], string $key = '', mixed $default = null)
 * Get item of an array by index, accepting nested index
 * @method static last(array $array, integer $take = null) Get last item(s) of an array. Passing n returns the last n elements.
 * @method static array map(array $array = [], Closure $closure) Returns an array of values by mapping each in collection through the iterator.
 * @method static mixed max(array $array = []) Returns the maximum value from the collection.
 * If passed an iterator, max will return max value returned by the iterator.
 * @method static mixed min(array $array = []) Returns the minimum value from the collection.
 * If passed an iterator, min will return min value returned by the iterator.
 * @method static array|object pluck(array $collection = [], $property = '') Returns an array of values belonging to a given property of each item in a collection.
 * @method static array where(array $array = [], array $key = []) Return data matching specific key value condition
 *
 * Arrays Functions
 * @method static array append(array $array, mixed $value = null) Append item to array
 * @method static array compact(array $array = []) Creates  an  array  with  all  false  values removed
 * @method static array flatten(array $array, bool $shallow = false, bool $strict = false) Flattens a multidimensional array.
 * If you pass shallow, the array will only be flattened a single level.
 * @method static array patch(array $array, array $patches, string $parent = '') Patches array by xpath.
 * @method static array prepend(array $array = [], mixed $value = null) Insert item or value to the beginning of array.
 * @method static array range(integer $start = null, integer $stop = null, integer $step = 1) Generate range of values based on start, end and step.
 * @method static array repeat(string $object = '', integer $times = null) Generate array of repeated values.
 *
 * UUID Functions
 * @method static uuidv3(string $namespace, string $name) Generate v3 UUID
 * @method static uuidv4() Generate v4 UUID
 * @method static uuidv5(string $namespace, string $name) Generate v5 UUID
 */
class Underscore extends \Underscore\Loader
{

}

/**
 * Class __
 *
 * @method static int now() Return current Unix timestamp
 */
class __
{
    public static function __callStatic($name, array $arguments = [])
    {
        return call_user_func_array(['Underscore', $name], $arguments);
    }
}