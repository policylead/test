<?php

namespace App\Http\Requests\SentEventAlert;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSentEventAlertRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'days' => 'required|integer',
            'sent' => 'required|integer',
            'error' => 'required|max:255',
            'num_docs' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id',

        ];
    }
}
