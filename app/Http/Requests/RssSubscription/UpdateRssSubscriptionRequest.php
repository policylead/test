<?php

namespace App\Http\Requests\RssSubscription;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRssSubscriptionRequest extends FormRequest
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
            'hash' => 'required|max:255',
            'feed_id' => 'required|integer|exists:feeds,id',

        ];
    }
}
