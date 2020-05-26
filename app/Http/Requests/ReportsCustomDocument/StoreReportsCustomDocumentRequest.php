<?php

namespace App\Http\Requests\ReportsCustomDocument;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportsCustomDocumentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'doc_title' => 'required|max:255',
            'pubdate_source' => 'required|numeric',
            'provider' => 'required|max:255',
            'author' => 'required|max:255',
            'teaser' => 'required',
            'fulltext' => 'required',
            'doc_link' => 'required|max:255',
            'public_link' => 'required|max:255',
            'article_image_description' => 'required',
            'article_image_size' => 'required|integer',
            'used' => 'required|integer',
            'fulltext_columns' => 'required|integer',
            'type' => 'required|max:255',
            'further_publications' => 'required',
            'deactivated_link' => 'required|integer',
            'provider_logo' => 'nullable|image',
            'article_image' => 'nullable|image',
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
