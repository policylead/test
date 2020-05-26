<?php

namespace App\Http\Requests\DocumentCount;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentCountRequest extends FormRequest
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
            'document_type' => 'required|max:255',
            'document_link' => 'required|max:255',
            'search_keyword' => 'nullable|max:255',
            'document_id' => 'required|integer|exists:documents,id',

        ];
    }
}
