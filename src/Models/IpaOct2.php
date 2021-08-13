<?php

namespace Antron\Ipa\Models;

use Illuminate\Database\Eloquent\Model;

class IpaOct2 extends Model
{


    public $incrementing = false;
    protected $primaryKey = 'bits';
    protected $guarded = ['bits'];
    protected $attributes = [
        'descript' => '',
        'assigned' => 0,
        'element_id' => 0,
        'element_type' => '',
    ];

    public function element()
    {
        return $this->morphTo();
    }

    public function getAllBits()
    {
        $ipa_oct3_styles = [];

        $ipa_oct3s = IpaOct3::where('bits', 'LIKE', $this->bits . '.%')
                ->orderBy('value', 'ASC')
                ->get()
                ->keyBy('bits');

        for ($n = 1; $n < 256; $n++) {
            $bits = $this->bits . '.' . $n;

            if (isset($ipa_oct3s[$bits])) {
                $ipa_oct3=$ipa_oct3s[$bits];
                
                $ipa_oct3->status = 5;
                
                $ipa_oct3_styles[] = $ipa_oct3;
            } else {
                $ipa_oct3 = new IpaOct3();

                $ipa_oct3->bits = $bits;

                $ipa_oct3->status = 0;

                $ipa_oct3_styles[] = $ipa_oct3;
            }
        }

        return $ipa_oct3_styles;
    }

    public function hasNotChild()
    {
        $child = IpaOct3::where('bits', 'LIKE', $this->bits . '.%')
                ->first();

        return is_null($child);
    }

}
