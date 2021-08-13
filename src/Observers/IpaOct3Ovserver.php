<?php



namespace Antron\Ipa\Observers;

use Antron\Ipa\Models\IpaOct3;

class IpaOct3Ovserver
{
    use IpaOctOvserverTrait;

    public function creating(IpaOct3 $ipa_oct3)
    {
        $ipa_oct3->value= self::getValue($ipa_oct3->bits);
    }


}
