<?php

namespace App\Http\Requests\SentEmailAlert;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSentEmailAlertRequest extends FormRequest
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
            'num_docs' => 'required|integer',
            'sent' => 'required|integer',
            'error' => 'required|max:255',
            'dashboard_id' => 'required|integer|exists:dashboards,id',

        ];
    }
}
