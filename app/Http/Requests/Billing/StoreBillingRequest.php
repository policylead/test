<?php

namespace App\Http\Requests\Billing;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillingRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'vat' => 'nullable|max:255',
            'invoice_receiver' => 'nullable|max:255',
            'iban' => 'nullable|max:255',
            'street' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',

        ];
    }
}
