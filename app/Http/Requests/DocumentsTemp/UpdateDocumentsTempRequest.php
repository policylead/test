<?php

namespace App\Http\Requests\DocumentsTemp;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentsTempRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'doc_id' => 'required|max:255',
            'feed_id' => 'required|integer',
            'provider' => 'required|max:255',

        ];
    }
}
