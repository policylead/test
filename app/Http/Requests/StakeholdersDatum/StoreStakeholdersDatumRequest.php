<?php

namespace App\Http\Requests\StakeholdersDatum;

use Illuminate\Foundation\Http\FormRequest;

class StoreStakeholdersDatumRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'description' => 'required|max:255',
            'location' => 'required|max:255',
            'abbr' => 'required|max:255',
            'facebook' => 'required|max:255',
            'twitter' => 'required|max:255',
            'political_bodies' => 'required|max:1000',
            'parliament' => 'required|max:255',
            'alias' => 'required|max:255',
            'authority' => 'required|max:255',
            'use_alias_only' => 'required|integer',
            'name' => 'required|max:255',
            'backup_picture' => 'nullable|image',

        ];
    }
}
