<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'short_name' => 'nullable|max:255',
            'name' => 'nullable|max:255',
            'url' => 'nullable|max:255',

        ];
    }
}
