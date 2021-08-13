<?php

namespace Antron\Ipa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IpaOct2Request extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'data.bits_valid' => 'ip',
            'bits' => [
                'required',
                Rule::unique('ipa_oct2s')->ignore($this->ipa_oct2),
            ],
        ];
    }

    public function validationData()
    {
        $data = ['bits_valid' => $this->input('bits') . '.1.1'];

        return $this->all() + ['data' => $data];
    }

    protected function getValidatorInstance()
    {
        $this->getInputSource()->replace($this->all());

        return parent::getValidatorInstance();
    }


}
