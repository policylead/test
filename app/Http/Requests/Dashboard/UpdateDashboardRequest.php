<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDashboardRequest extends FormRequest
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
            'email' => 'required|integer',
            'active' => 'required|integer',
            'delay_time' => 'required|numeric',
            'last_sent' => 'required|numeric',
            'keywords' => 'required',
            'first_alert' => 'required|integer',
            'second_alert' => 'required|integer',
            'alert_frequency' => 'required|max:255',
            'alert_weekday' => 'required|max:255',
            'edited_by' => 'required|integer',
            'locked_time' => 'required|date',
            'locked_by' => 'required|integer',
            'dashboard_type' => 'required|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'team_id' => 'required|integer|exists:teams_lists,id',

        ];
    }
}
