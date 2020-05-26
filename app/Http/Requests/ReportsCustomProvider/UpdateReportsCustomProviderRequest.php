<?php

namespace App\Http\Requests\ReportsCustomProvider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportsCustomProviderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'provider_name' => 'required|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'team_id' => 'required|integer|exists:teams_lists,id',
            'logo' => 'required|image',

        ];
    }
}
