<?php

namespace Antron\Ipa\Observers;

Trait IpaOctOvserverTrait
{

    protected static function getValue($bits)
    {
        $value = 0;

        foreach (explode('.', $bits) as $bit) {
            $value = $value * 256;

            $value += $bit;
        }

        return $value;
    }

}
