<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'pubdate_source' => 'required|date',
            'doc_title' => 'required|max:1000',
            'record_nr' => 'required|max:255',
            'doc_link' => 'required|max:255',
            'doc_id' => 'required|max:255',
            'feed_id' => 'required|integer',
            'fulltext' => 'required',
            'ui' => 'required|integer|min:0',
            'location' => 'nullable|max:255',
            'country' => 'nullable|max:255',
            'subcountry' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'doc_type' => 'required|max:255',
            'author_person' => 'required',
            'related_records' => 'required',
            'bill_keywords' => 'required',
            'related_people' => 'required',
            'status' => 'required|max:255',
            'author_group' => 'required',
            'event_time' => 'nullable|max:255',
            'source_keywords' => 'nullable|max:255',
            'publish_status' => 'required|integer',
            'pdf_local_path' => 'nullable|max:255',
            'people_tags' => 'required',
            'update_link' => 'required|max:255',
            'additional_content_link' => 'nullable|max:255',
            'document_image_link' => 'nullable|max:255',
            'policylead_doc_type' => 'nullable|max:255',
            'origin' => 'required|max:255',
            'provider_group' => 'required|max:255',
            'title_opennlp' => 'nullable|max:255',
            'language' => 'nullable|max:255',
            'author_list' => 'required|max:255',
            'related_people_list' => 'required',
            'processed' => 'required|integer',
            'provider_group_container' => 'required|max:255',
            'retweets' => 'required|integer',
            'favorites' => 'required|integer',
            'twitter_account_photo' => 'nullable|max:255',
            'authors_added' => 'required|integer',
            'ocr_needed' => 'required|integer',
            'run' => 'required|max:255',
            'distribution' => 'required|max:255',
            'fulltext_raw' => 'required',
            'social_media_type' => 'nullable|max:255',
            'users' => 'required|max:255',
            'index_ready' => 'required|integer',
            'provider_id' => 'required|integer|exists:providers,id',

        ];
    }
}
