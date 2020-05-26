<?php

namespace App\Http\Requests\DashboardsSetting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDashboardsSettingRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'active' => 'required|integer',
            'first_alert' => 'required|integer',
            'second_alert' => 'required|integer',
            'delay_time' => 'required|numeric',
            'last_sent' => 'required|numeric',
            'alert_frequency' => 'required|max:255',
            'alert_weekday' => 'required|max:255',
            'channels' => 'required|max:255',
            'push_alert' => 'required|integer',
            'push_monday' => 'required|integer',
            'push_tuesday' => 'required|integer',
            'push_wednesday' => 'required|integer',
            'push_thursday' => 'required|integer',
            'push_friday' => 'required|integer',
            'push_saturday' => 'required|integer',
            'push_sunday' => 'required|integer',
            'push_from' => 'required|integer',
            'push_to' => 'required|integer',
            'push_type' => 'required|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'dashboard_id' => 'required|integer|exists:dashboards,id',

        ];
    }
}
