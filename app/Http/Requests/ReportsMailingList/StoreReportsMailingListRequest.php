<?php

namespace App\Http\Requests\ReportsMailingList;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportsMailingListRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required|max:255',
            'emails' => 'required',
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
