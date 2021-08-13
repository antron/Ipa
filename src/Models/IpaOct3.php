<?php

namespace Antron\Ipa\Models;

use Illuminate\Database\Eloquent\Model;

class IpaOct3 extends Model
{

    public $status;
    public $incrementing = false;
    protected $primaryKey = 'bits';
    protected $guarded = ['bits'];
    protected $attributes = [
        'descript' => '',
        'assigned' => 0,
        'element_id' => 0,
        'element_type' => '',
    ];
    private $ipa_oct2;

    public function element()
    {
        return $this->morphTo();
    }

    public function IpaOct2()
    {
        if (is_null($this->ipa_oct2)) {
            $bits = \Antron\Ipa\Ipa::getNetworkBits($this->bits);

            $this->ipa_oct2 = IpaOct2::find($bits);
        }

        return $this->ipa_oct2;
    }

    public function hasNotChild()
    {
        $child = \Antron\Ipa\Models\IpaOct4::where('bits', 'LIKE', $this->bits . '.%')
                ->first();

        return is_null($child);
    }

    public function getAllBits()
    {
        $ipa_oct4_styles = [];

        $ipa_oct4s = \Antron\Ipa\Models\IpaOct4::where('bits', 'LIKE', $this->bits . '.%')
                ->orderBy('value', 'ASC')
                ->get()
                ->keyBy('bits');

        for ($n = 1; $n < 256; $n++) {
            $bits = $this->bits . '.' . $n;

            if (isset($ipa_oct4s[$bits])) {
                $ipa_oct4_styles[] = $ipa_oct4s[$bits];
            } else {
                $ipa_oct4 = new IpaOct4();

                $ipa_oct4->bits = $bits;

                $ipa_oct4->status = 0;

                $ipa_oct4_styles[] = $ipa_oct4;
            }
        }

        return $ipa_oct4_styles;
    }

}
