<?php

namespace App\Http\Requests\StakeholdersKeyword;

use Illuminate\Foundation\Http\FormRequest;

class StoreStakeholdersKeywordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'channels' => 'required|max:255',
            'keywords' => 'required',
            'context_range' => 'required|integer',
            'excluded_keywords' => 'required|max:255',
            'list_id' => 'required|integer|exists:stakeholders,id',

        ];
    }
}
