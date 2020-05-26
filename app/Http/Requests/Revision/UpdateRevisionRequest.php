<?php

namespace App\Http\Requests\Revision;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRevisionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'revisionable_type' => 'required|max:255',
            'revisionable_id' => 'required|integer',
            'key' => 'required|max:255',
            'old_value' => 'required',
            'new_value' => 'required',
            'user_id' => 'required|integer|exists:users,id',

        ];
    }
}
