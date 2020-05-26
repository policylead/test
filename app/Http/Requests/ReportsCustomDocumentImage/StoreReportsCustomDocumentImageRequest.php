<?php

namespace App\Http\Requests\ReportsCustomDocumentImage;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportsCustomDocumentImageRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'article_image' => 'required|image',
            'document_id' => 'required|integer|exists:documents,id',

        ];
    }
}
