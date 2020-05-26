<?php

namespace App\Http\Requests\FacebookAccount;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacebookAccountRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required|max:255',
            'facebookId' => 'required|max:255',
            'last_check' => 'required|date',
            'facebook_account_photo' => 'required',
            'type' => 'nullable|max:255',
            'country' => 'nullable|max:255',
            'subcountry' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'full_name' => 'required|max:255',

        ];
    }
}
