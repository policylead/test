<?php

namespace App\Http\Requests\ReportsCustomProvider;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportsCustomProviderRequest extends FormRequest
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
            'logo' => 'required|image',
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
