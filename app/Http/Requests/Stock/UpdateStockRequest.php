<?php

namespace App\Http\Requests\Stock;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'code' => 'required|max:255',
            'price' => 'required|numeric|max:8',
            'difference' => 'required|max:255',

        ];
    }
}
