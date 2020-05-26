<?php

namespace App\Http\Requests\SmsLink;

use Illuminate\Foundation\Http\FormRequest;

class StoreSmsLinkRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'code' => 'required|max:255',
            'link' => 'required|max:255',

        ];
    }
}
