<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "documents";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'bookmarks', 'documentCounts', 'documentsComments', 'reportsCustomDocumentImages', 'provider', 'authors', 'persons'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'pubdate_source',
        'doc_title',
        'record_nr',
        'doc_link',
        'doc_id',
        'feed_id',
        'fulltext',
        'ui',
        'location',
        'country',
        'subcountry',
        'city',
        'doc_type',
        'author_person',
        'related_records',
        'bill_keywords',
        'related_people',
        'status',
        'author_group',
        'event_time',
        'source_keywords',
        'publish_status',
        'pdf_local_path',
        'people_tags',
        'update_link',
        'additional_content_link',
        'document_image_link',
        'policylead_doc_type',
        'origin',
        'provider_group',
        'title_opennlp',
        'language',
        'author_list',
        'related_people_list',
        'processed',
        'provider_group_container',
        'retweets',
        'favorites',
        'twitter_account_photo',
        'authors_added',
        'ocr_needed',
        'run',
        'distribution',
        'fulltext_raw',
        'social_media_type',
        'users',
        'index_ready'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pubdate_source',
        'doc_title',
        'record_nr',
        'doc_link',
        'doc_id',
        'feed_id',
        'fulltext',
        'ui',
        'location',
        'country',
        'subcountry',
        'city',
        'doc_type',
        'author_person',
        'related_records',
        'bill_keywords',
        'related_people',
        'status',
        'author_group',
        'event_time',
        'source_keywords',
        'publish_status',
        'pdf_local_path',
        'people_tags',
        'update_link',
        'additional_content_link',
        'document_image_link',
        'policylead_doc_type',
        'origin',
        'provider_group',
        'title_opennlp',
        'language',
        'author_list',
        'related_people_list',
        'processed',
        'provider_group_container',
        'retweets',
        'favorites',
        'twitter_account_photo',
        'authors_added',
        'ocr_needed',
        'run',
        'distribution',
        'fulltext_raw',
        'social_media_type',
        'users',
        'index_ready',
        'provider_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'pubdate_source',
        'doc_title',
        'record_nr',
        'doc_link',
        'doc_id',
        'feed_id',
        'fulltext',
        'ui',
        'location',
        'country',
        'subcountry',
        'city',
        'doc_type',
        'author_person',
        'related_records',
        'bill_keywords',
        'related_people',
        'status',
        'author_group',
        'event_time',
        'source_keywords',
        'publish_status',
        'pdf_local_path',
        'people_tags',
        'update_link',
        'additional_content_link',
        'document_image_link',
        'policylead_doc_type',
        'origin',
        'provider_group',
        'title_opennlp',
        'language',
        'author_list',
        'related_people_list',
        'processed',
        'provider_group_container',
        'retweets',
        'favorites',
        'twitter_account_photo',
        'authors_added',
        'ocr_needed',
        'run',
        'distribution',
        'fulltext_raw',
        'social_media_type',
        'users',
        'index_ready'
    ];

    public $timestamps = true;

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'author_documents',
            'document_id',
            'author_id'
        )->withTimestamps();
    }
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, 'document_id');
    }
    public function documentCounts(): HasMany
    {
        return $this->hasMany(DocumentCount::class, 'document_id');
    }
    public function documentsComments(): HasMany
    {
        return $this->hasMany(DocumentsComment::class, 'document_id');
    }
    public function reportsCustomDocumentImages(): HasMany
    {
        return $this->hasMany(ReportsCustomDocumentImage::class, 'document_id');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
    public function persons(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'person_documents',
            'document_id',
            'person_id'
        )->withTimestamps();
    }
}
