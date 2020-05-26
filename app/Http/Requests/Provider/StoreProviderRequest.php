<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
            'provider_group_container' => 'required|max:255',
            'provider_group_container_index' => 'required|integer',
            'country' => 'required|max:255',
            'subcountry' => 'required|max:255',
            'city' => 'required|max:255',
            'feed_id' => 'required|integer',
            'social_media_type' => 'nullable|max:255',

        ];
    }
}
