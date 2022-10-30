<?php

namespace App\Http\Requests\API\V1\Insurance;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsuranceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'national_id' => 'required',
            'date' => 'required|date',
            'distance' => 'required|numeric',
            'amount' => 'required|numeric',
            'start_point' => 'required|string',
            'start_address' => 'required|string',
            'end_point' => 'required|string',
            'end_address' => 'required|string',
            'vat' => 'required|numeric',
            'total_camels_value' => 'required|numeric',
            'sub_total' => 'required|numeric',
            'fees' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'iban' => 'required|string',
            'camels' => 'required|array|max:5',
            'camels.*' => 'array',
            'camels.*.ship_number'=> 'required',
            'camels.*.value'=> 'required|numeric|min:5000|max:100000',
            'broker_id'=> 'nullable'
        ];
    }

    public function prepareForValidation()
    {
        if ($this->authenticated_app instanceof \App\Models\Broker)
        {
            $this->merge([
                'broker_id' => $this->authenticated_app->id,
            ]);
        }
    }

//    public function passedValidation()
//    {
//        if ($this->authenticated_app instanceof \App\Models\Broker)
//        {
//            $this->merge([
//                'broker_id' => $this->authenticated_app->id,
//            ]);
//        }
//    }
}
