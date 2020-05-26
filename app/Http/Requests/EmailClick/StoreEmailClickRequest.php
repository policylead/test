<?php

namespace App\Http\Requests\EmailClick;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailClickRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'client_ip' => 'required|max:255',
            'session_id' => 'required|max:255',
            'sent_email_alert_id' => 'required|integer|min:0',
            'url' => 'required|max:255',

        ];
    }
}
