<?php

namespace App\Http\Requests\SubjectArea;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectAreaRequest extends FormRequest
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
