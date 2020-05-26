<?php

namespace App\Http\Requests\DocumentsComment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentsCommentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'type' => 'required|integer',
            'comment' => 'required',
            'user_id' => 'required|integer|exists:users,id',
            'team_id' => 'required|integer|exists:teams_lists,id',
            'document_id' => 'required|integer|exists:documents,id',

        ];
    }
}
