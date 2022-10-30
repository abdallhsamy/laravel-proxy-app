<?php

namespace App\Http\Requests\Admin\PricingRate;

use App\Enums\PricingRateType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePricingRateRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'from' => 'numeric',
            'to' => 'numeric',
            'price' => 'numeric',
            'type' => [
                'required',
                Rule::in(PricingRateType::values())
            ],
        ];
    }
}
