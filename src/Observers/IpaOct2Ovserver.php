<?php

namespace Antron\Ipa\Observers;

use Antron\Ipa\Models\IpaOct2;

class IpaOct2Ovserver
{
    use IpaOctOvserverTrait;

    public function creating(IpaOct2 $ipa_oct2)
    {
        $ipa_oct2->value= self::getValue($ipa_oct2->bits);
    }


}
