<?php

namespace App\Http\Requests\Alert;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlertRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'provider' => 'required',
            'frequency' => 'required|max:255',
            'active' => 'required|integer',
            'weekday' => 'required|max:255',

        ];
    }
}
