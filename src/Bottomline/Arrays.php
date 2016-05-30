<?php

namespace Bottomline;

class Arrays
{
    /**
     * Append item to array
     *
     * @param array $array The input array
     * @param null $value Value to append
     * @return int
     */
    public static function append(array $array = array(), $value = null)
    {
        $array[] = $value;

        return $array;
    }
}