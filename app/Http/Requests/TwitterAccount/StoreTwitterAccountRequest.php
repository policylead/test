<?php

namespace App\Http\Requests\TwitterAccount;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwitterAccountRequest extends FormRequest
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
            'twitterId' => 'required|integer',
            'twitts_amount' => 'required|integer',
            'last_check' => 'required|date',
            'timeline_check' => 'required|integer',
            'photo_url' => 'required',
            'type' => 'required|max:255',
            'country' => 'nullable|max:255',
            'subcountry' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'role' => 'nullable|max:255',
            'full_name' => 'required|max:255',

        ];
    }
}
