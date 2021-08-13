<?php



namespace Antron\Ipa\Observers;

use Antron\Ipa\Models\IpaOct4;

class IpaOct4Ovserver
{
    use IpaOctOvserverTrait;


    public function creating(IpaOct4 $ipa_oct4)
    {
        $ipa_oct4->value= self::getValue($ipa_oct4->bits);
    }


}
