<?php

namespace App\Http\Requests\NewsletterSubscription;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsletterSubscriptionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'offers' => 'required|integer',
            'verified' => 'required|integer',
            'hash' => 'required|max:255',
            'report_template_id' => 'required|integer|exists:report_templates,id',
            'report_mailing_list_id' => 'required|integer|exists:reports_mailing_lists,id',

        ];
    }
}
