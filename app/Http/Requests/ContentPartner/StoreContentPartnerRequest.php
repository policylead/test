<?php

namespace App\Http\Requests\ContentPartner;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentPartnerRequest extends FormRequest
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
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
