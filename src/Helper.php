<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 7-3-19
 * Time: 10:49
 */

namespace Paynl\IDIN;


class Helper
{
    /**
     * Convert a stdClass object to an array
     *
     * @param \stdClass $d
     *
     * @return array
     */
    public static function objectToArray($d)
    {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }
        if ( ! is_array($d)) {
            return $d;
        }

        return array_map(array(__CLASS__, __FUNCTION__), $d); // recursive
    }
}