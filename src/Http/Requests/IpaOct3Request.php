<?php

namespace Antron\Ipa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IpaOct3Request extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    protected function getValidatorInstance()
    {
        $inputs = $this->all();

        if (is_null($inputs['descript'])) {
            $inputs['descript'] = '';
        }

        $this->getInputSource()->replace($inputs);

        return parent::getValidatorInstance();
    }

}
