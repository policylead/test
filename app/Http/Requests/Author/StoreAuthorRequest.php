<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'marital_status_title' => 'nullable|max:10',
            'first_name' => 'nullable|max:255',
            'full_name' => 'nullable|max:255',
            'last_name' => 'nullable|max:255',
            'title' => 'nullable|max:255',
            'parliament' => 'nullable|max:255',
            'abbr' => 'nullable|max:255',
            'sex' => 'nullable|max:255',
            'profile_photo' => 'nullable|max:255',
            'fraction' => 'nullable|max:255',
            'biography' => 'required',
            'profession' => 'nullable|max:255',
            'birthplace' => 'nullable|max:255',
            'birth_date' => 'nullable|date',
            'children' => 'nullable|max:255',
            'denomination' => 'nullable|max:255',
            'marital_status' => 'nullable|max:255',
            'email1' => 'nullable|max:255',
            'email2' => 'nullable|max:255',
            'personal_site' => 'nullable|max:255',
            'political_bodies' => 'required',
            'parliament_membership' => 'nullable|max:255',
            'election_result' => 'nullable|max:255',
            'federal_state' => 'nullable|max:255',
            'official_function' => 'nullable|max:255',
            'parliament_2' => 'required',
            'additional_address_parliament' => 'nullable|max:255',
            'mailbox_street_address_parliament' => 'nullable|max:255',
            'zip_code_parliament' => 'nullable|max:255',
            'city_parliament' => 'nullable|max:255',
            'eu_member_country_parliament' => 'nullable|max:255',
            'phone_code_parliament' => 'nullable|max:255',
            'phone_number_parliament' => 'nullable|max:255',
            'fax_code_number_parliament' => 'nullable|max:255',
            'fax_number_parliament' => 'nullable|max:255',
            'ministry_request_reg' => 'nullable|max:255',
            'additional_address_reg' => 'nullable|max:255',
            'mailbox_street_address_reg' => 'nullable|max:255',
            'zip_code_reg' => 'nullable|max:255',
            'city_reg' => 'nullable|max:255',
            'eu_member_country_reg' => 'nullable|max:255',
            'phone_code_reg' => 'nullable|max:255',
            'phone_number_reg' => 'nullable|max:255',
            'fax_code_number_reg' => 'nullable|max:255',
            'fax_number_reg' => 'nullable|max:255',
            'constituency_private' => 'nullable|max:255',
            'additional_address_wk' => 'nullable|max:255',
            'mailbox_street_address_wk' => 'nullable|max:255',
            'zip_code_wk' => 'nullable|max:255',
            'city_wk' => 'nullable|max:255',
            'eu_member_country_wk' => 'nullable|max:255',
            'phone_code_wk' => 'nullable|max:255',
            'phone_number_wk' => 'nullable|max:255',
            'fax_code_number_wk' => 'nullable|max:255',
            'fax_number_wk' => 'nullable|max:255',
            'employ_parliament' => 'required',
            'employ_reg' => 'required',
            'employ_wk' => 'required',
            'e_n_g_l_a_n_r_e_d_e' => 'nullable|max:255',
            'networks' => 'nullable|max:255',
            'twitter' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'period' => 'nullable|max:255',
            'qualification' => 'nullable|max:255',
            'election_list' => 'nullable|max:255',
            'avatar' => 'required|max:255',
            'twitter_avatar' => 'required|max:255',
            'facebook_avatar' => 'required|max:255',
            'last_check' => 'required|numeric',
            'institution' => 'required|max:255',

        ];
    }
}
