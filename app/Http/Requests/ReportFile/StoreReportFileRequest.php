<?php

namespace App\Http\Requests\ReportFile;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportFileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'type' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'fulltext' => 'required',
            'bill_keywords' => 'required|max:255',
            'related_records' => 'required|max:255',
            'email1' => 'required|max:255',
            'full_name' => 'required|max:255',
            'birth_date' => 'nullable|date',
            'profession' => 'required|max:255',
            'abbr' => 'required|max:255',
            'mailbox_street_address_parliament' => 'required|max:255',
            'zip_code_parliament' => 'required|max:255',
            'city_parliament' => 'required|max:255',
            'profile_picture' => 'required|max:255',
            'personal_site' => 'required|max:255',
            'political_bodies' => 'required|max:255',
            'employee_parliament' => 'required|max:255',
            'fraction' => 'required|max:255',
            'zip_code_wk' => 'required|max:255',
            'city_wk' => 'required|max:255',
            'biography' => 'required',
            'phone_code_parliament' => 'required|max:255',
            'phone_number_parliament' => 'required|max:255',
            'fax_number_parliament' => 'required|max:255',
            'text_section' => 'required',
            'abstract' => 'required',
            'provider' => 'required|max:255',
            'provider_group' => 'required|max:255',
            'doc_type' => 'required|max:255',

        ];
    }
}
