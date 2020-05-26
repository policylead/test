<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return
         [
            'email' => "required|email|max:255|unique:users",
            'password' => "required|confirmed|min:6",
            'first_name' => 'required|max:255',
            'remember_token' => 'nullable|max:100',
            'last_name' => 'required|max:255',
            'full_name' => 'required|max:255',
            'role' => 'required|integer',
            'agency_name' => 'nullable|max:255',
            'office_name' => 'nullable|max:255',
            'press_releases' => 'nullable|max:255',
            'homepage' => 'nullable|max:255',
            'university_id' => 'nullable|max:255',
            'subject_area_id' => 'nullable|max:255',
            'blog' => 'nullable|max:255',
            'employee' => 'nullable|max:255',
            'tel' => 'nullable|max:255',
            'terms_and_conditions' => 'nullable|max:255',
            'verified' => 'required|integer',
            'verification_token' => 'nullable|max:255',
            'lead_type' => 'nullable|max:255',
            'profile_photo' => 'nullable|max:255',
            'student_card' => 'nullable|max:255',
            'test_period' => 'required|max:255',
            'client_status' => 'required|max:255',
            'data_filled' => 'required|integer',
            'approved' => 'required|integer',
            'alert_providers' => 'required',
            'alert_frequency' => 'required|max:255',
            'alert_weekday' => 'required|max:255',
            'blocked_documents' => 'required',
            'first_alert' => 'required|integer',
            'second_alert' => 'required|integer',
            'newsdesk_provider_filter' => 'required|integer',
            'personal_email_for_reports' => 'required|integer',
            'settings_1to1_support' => 'required|integer',
            'settings_newsdesk_support' => 'required|integer',
            'settings_click_tracking_reports' => 'required|integer',
            'settings_click_tracking_other' => 'required|integer',
            'settings_newsletter_features' => 'required|integer',
            'settings_newsletter_expired' => 'required|integer',
            'settings_reconnect' => 'required|integer',
            'custom_sender_email' => 'required|max:255',
            'custom_sender_name' => 'required|max:255',
            'client_feeds_enabled' => 'required|integer',
            'language' => 'required|max:255',
            'salutation' => 'required|max:255',

        ];
    }
}
