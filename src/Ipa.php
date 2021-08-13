<?php

/**
 */

namespace Antron\Ipa;

class Ipa
{

    public static function calcValue($bits)
    {
        $value = 0;

        foreach (explode('.', $bits) as $bit) {
            $value = $value * 256;

            $value += $bit;
        }

        return $value;
    }

    public static function getNetworkBits($string)
    {
        $explode = explode('.', $string);

        $count = 0;

        $array = [];

        while ($count < count($explode) - 1) {

            $array[] = $explode[$count];

            $count++;
        }

        return implode('.', $array);
    }

}
