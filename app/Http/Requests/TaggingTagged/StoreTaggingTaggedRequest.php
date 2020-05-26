<?php

namespace App\Http\Requests\TaggingTagged;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaggingTaggedRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'taggable_type' => 'required|max:255',
            'tag_name' => 'required|max:255',
            'tag_slug' => 'required|max:255',
            'taggable_id' => 'required|integer|exists:sent_email_alerts,id',

        ];
    }
}
