<?php

namespace App\Http\Requests\TaggingTag;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaggingTagRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'slug' => 'required|max:255',
            'name' => 'required|max:255',
            'suggest' => 'required|integer',
            'count' => 'required|integer|min:0',

        ];
    }
}
