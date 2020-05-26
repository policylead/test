<?php

namespace App\Http\Requests\ClientFeedReportAssociation;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientFeedReportAssociationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'title_template' => 'required|max:128',
            'description_template' => 'required|max:255',
            'link_template' => 'required|max:255',
            'author_template' => 'required|max:255',
            'pubdate_template' => 'required|max:255',
            'category_template' => 'required|max:255',
            'client_feed_id' => 'required|integer|exists:client_feeds,id',
            'report_id' => 'required|integer|exists:reports,id',

        ];
    }
}
