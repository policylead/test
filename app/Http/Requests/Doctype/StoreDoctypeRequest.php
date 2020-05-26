<?php

namespace App\Http\Requests\Doctype;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctypeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'doctype_full' => 'required|max:255',
            'doctype_short' => 'required|max:255',

        ];
    }
}
