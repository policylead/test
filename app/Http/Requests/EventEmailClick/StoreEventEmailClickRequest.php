<?php

namespace App\Http\Requests\EventEmailClick;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventEmailClickRequest extends FormRequest
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
            'sent_event_alert_id' => 'required|integer|min:0',
            'url' => 'required|max:255',

        ];
    }
}
