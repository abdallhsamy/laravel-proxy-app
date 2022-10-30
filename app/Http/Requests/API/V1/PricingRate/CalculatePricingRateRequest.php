<?php

namespace App\Http\Requests\API\V1\PricingRate;

use Illuminate\Foundation\Http\FormRequest;

class CalculatePricingRateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'distance' => 'required|numeric'
        ];
    }
}
