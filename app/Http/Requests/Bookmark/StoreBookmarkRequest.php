<?php

namespace App\Http\Requests\Bookmark;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookmarkRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'color' => 'required|max:255',
            'document_type' => 'required|max:255',
            'search_keyword' => 'required',
            'snippet' => 'required',
            'reviewed' => 'required|integer',
            'team_id' => 'required|integer|exists:teams_lists,id',
            'document_id' => 'required|integer|exists:documents,id',
            'newsdesk_id' => 'required|integer|exists:dashboards,id',

        ];
    }
}
