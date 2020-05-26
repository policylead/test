<?php

namespace App\Http\Requests\ReportTemplate;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportTemplateRequest extends FormRequest
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
            'chapters' => 'required',
            'title' => 'required|max:255',
            'author_name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'enabled' => 'required|integer',
            'attach_pdf' => 'required|integer',
            'attach_html' => 'required|integer',
            'users' => 'required',
            'teams' => 'required',
            'logo' => 'required|image',

        ];
    }
}
