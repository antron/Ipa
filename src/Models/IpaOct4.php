<?php

namespace Antron\Ipa\Models;

use Illuminate\Database\Eloquent\Model;

class IpaOct4 extends Model
{


    public $incrementing = false;

    protected $primaryKey = 'bits';

    protected $guarded = ['bits'];

    protected $attributes = [
        'descript' => '',
        'status' => 1,
        'element_id' => 0,
        'element_type' => '',
    ];
    private $ipa_oct3;

    public function element()
    {
        return $this->morphTo();
    }

    public function IpaOct3()
    {
        if (is_null($this->ipa_oct3)) {
            $bits= \Antron\Ipa\Ipa::getNetworkBits($this->bits);
            
            $this->ipa_oct3= IpaOct3::find($bits);
        }
        
        return $this->ipa_oct3;
    }


}
