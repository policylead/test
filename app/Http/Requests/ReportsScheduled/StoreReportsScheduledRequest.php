<?php

namespace App\Http\Requests\ReportsScheduled;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportsScheduledRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'emails' => 'required',
            'sender_email' => 'required|max:255',
            'custom_sender_email' => 'required|max:255',
            'custom_sender_name' => 'required|max:255',
            'subject' => 'required|max:255',
            'keywords' => 'required',
            'message' => 'required',
            'attach_pdf' => 'required|integer',
            'send_as_html' => 'required|integer',
            'sent' => 'required|integer',
            'created_at' => 'required|numeric',
            'lock_hash' => 'required|max:255',
            'report_id' => 'required|integer|exists:reports,id',
            'list_id' => 'required|integer|exists:reports_mailing_lists,id',

        ];
    }
}
