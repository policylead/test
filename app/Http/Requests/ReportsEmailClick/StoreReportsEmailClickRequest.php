<?php

namespace App\Http\Requests\ReportsEmailClick;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportsEmailClickRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'title' => 'required|max:255',
            'link' => 'required|max:255',
            'clicks' => 'required|integer',
            'date' => 'required|integer',
            'hash' => 'required|max:255',
            'chapter' => 'required|max:255',
            'report_id' => 'required|integer|exists:reports,id',

        ];
    }
}
