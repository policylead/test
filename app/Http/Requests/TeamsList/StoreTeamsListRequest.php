<?php

namespace App\Http\Requests\TeamsList;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamsListRequest extends FormRequest
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

        ];
    }
}
