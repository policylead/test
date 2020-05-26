<?php

namespace App\Http\Requests\ClientFeed;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientFeedRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'title' => 'required|max:128',
            'published' => 'required|integer',
            'description' => 'required',
            'content' => 'required',
            'document_count' => 'required|integer|min:0',
            'external_id' => 'required|max:255',
            'user_id' => 'required|integer|exists:users,id',

        ];
    }
}
