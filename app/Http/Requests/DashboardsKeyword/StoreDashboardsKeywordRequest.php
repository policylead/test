<?php

namespace App\Http\Requests\DashboardsKeyword;

use Illuminate\Foundation\Http\FormRequest;

class StoreDashboardsKeywordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'keywords' => 'required',
            'filter' => 'required',
            'providers_count' => 'required|integer',
            'dashboard_id' => 'required|integer|exists:dashboards,id',

        ];
    }
}
