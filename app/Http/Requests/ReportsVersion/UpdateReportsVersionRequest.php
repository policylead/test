<?php

namespace App\Http\Requests\ReportsVersion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportsVersionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'report' => 'required',
            'report_id' => 'required|integer|exists:reports,id',
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
