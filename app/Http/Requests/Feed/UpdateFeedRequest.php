<?php

namespace App\Http\Requests\Feed;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'status' => 'required|integer',
            'health' => 'required|max:255',
            'manual' => 'required|integer',
            'location_auto_find' => 'required|integer',
            'goose' => 'required|integer',
            'documents_count' => 'required|integer',
            'last_document' => 'required|numeric',
            'source_link' => 'required',
            'use_html' => 'nullable|integer',
            'list_css' => 'nullable|max:255',
            'link_css' => 'nullable|max:255',
            'title_css' => 'nullable|max:255',
            'title_attr' => 'nullable|max:255',
            'date_css' => 'nullable|max:255',
            'date_attr' => 'nullable|max:255',
            'author' => 'required|max:255',
            'location' => 'required|max:255',
            'country' => 'nullable|max:255',
            'subcountry' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'provider_group' => 'required|max:255',
            'doc_type' => 'required|max:255',
            'title' => 'required|max:255',
            'pub_date' => 'required|max:255',
            'fulltext_mode' => 'nullable|max:255',
            'fulltext_source_link' => 'nullable|max:255',
            'event_field' => 'nullable|max:255',
            'fulltext_xpath' => 'nullable|max:255',
            'fulltext_field' => 'nullable|max:255',
            'selector' => 'nullable|max:255',
            'source_keywords' => 'nullable|max:255',
            'last_scraped' => 'required|numeric',
            'description' => 'required',
            'special_encoding' => 'required|integer',
            'top_source' => 'required|integer',
            'lock_hash' => 'required|max:255',
            'scrape_all' => 'required|integer',
            'news_type' => 'required|max:255',
            'created_by' => 'required|integer',
            'content_partner' => 'required|integer',
            'scraping_mode' => 'required|max:255',
            'options' => 'required',
            'first_document' => 'required',
            'provider_id' => 'required|integer|exists:providers,id',

        ];
    }
}
