<?php

namespace App\Http\Requests\FeedsManual;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedsManualRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'increment' => 'required|max:255',
            'date_xpath' => 'required|max:255',
            'title_xpath' => 'required|max:255',
            'doc_link_xpath' => 'required|max:255',
            'feed_id' => 'required|integer|exists:feeds,id',

        ];
    }
}
