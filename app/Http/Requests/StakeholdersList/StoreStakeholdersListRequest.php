<?php

namespace App\Http\Requests\StakeholdersList;

use Illuminate\Foundation\Http\FormRequest;

class StoreStakeholdersListRequest extends FormRequest
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
            'parent_id' => 'required|integer|exists:stakeholders,id',
            'author_id' => 'required|integer|exists:authors,id',
            'stakeholders_data_id' => 'required|integer|exists:stakeholders_datas,id',

        ];
    }
}
