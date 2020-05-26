<?php

namespace App\Http\Requests\Stakeholder;

use Illuminate\Foundation\Http\FormRequest;

class StoreStakeholderRequest extends FormRequest
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
            'alert_channels' => 'required|max:255',
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
