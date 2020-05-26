<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'layout' => 'required|max:255',
            'logo' => 'nullable|max:255',
            'author' => 'nullable|max:255',
            'company_name' => 'required|max:255',
            'published_at' => 'required|numeric',
            'content' => 'required',
            'emails' => 'required',
            'attach_pdf' => 'nullable|integer',
            'attach_html' => 'nullable|integer',
            'last_edited' => 'required|date',
            'report_image_description' => 'required|max:255',
            'published' => 'required|integer',
            'sent_at' => 'required|numeric',
            'template' => 'required|max:255',
            'template_options' => 'required',
            'author_id' => 'required|integer|exists:authors,id',
            'team_id' => 'required|integer|exists:teams_lists,id',
            'report_template_id' => 'required|integer|exists:report_templates,id',

        ];
    }
}
