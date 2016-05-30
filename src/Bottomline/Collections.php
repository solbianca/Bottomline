<?php

namespace Bottomline;

class Collections
{

    /**
     * Get item of an array by index , accepting nested index
     *
     ** __::get(['foo' => ['bar' => 'ter']], 'foo.bar');
     ** // → 'ter'
     *
     * @param array $collection array of values
     * @param string $key key or index
     * @param null $default default value to return if index not exist
     *
     * @return array|mixed|null
     *
     */
    public static function get($collection = array(), $key = '', $default = null)
    {
        if (Objects::isNull($key)) {
            return $collection;
        }

        if (!Objects::isObject($collection) && isset($collection[$key])) {
            return $collection[$key];
        }

        foreach (\explode('.', $key) as $segment) {
            if (Objects::isObject($collection)) {
                if (!isset($collection->{$segment})) {
                    return $default instanceof \Closure ? $default() : $default;
                } else {
                    $collection = $collection->$segment;
                }
            } else {
                if (!isset($collection[$segment])) {
                    return $default instanceof \Closure ? $default() : $default;
                } else {
                    $collection = $collection[$segment];
                }
            }
        }

        return $collection;
    }
}