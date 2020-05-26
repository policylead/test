<?php

namespace App\Http\Requests\UserLimit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserLimitRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'key' => 'required|max:255',
            'limit' => 'required|integer|min:0',
            'user_id' => 'required|integer|exists:users,id',

        ];
    }
}
