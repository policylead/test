<?php

namespace App\Http\Requests\FeedsDuplicate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedsDuplicateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'link' => 'required|max:255',
            'feed_1' => 'required|integer',
            'feed_2' => 'required|integer',

        ];
    }
}
