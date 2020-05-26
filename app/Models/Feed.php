<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "feeds";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'feedsManuals', 'rssSubscriptions', 'provider'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'status',
        'health',
        'manual',
        'location_auto_find',
        'goose',
        'documents_count',
        'last_document',
        'source_link',
        'use_html',
        'list_css',
        'link_css',
        'title_css',
        'title_attr',
        'date_css',
        'date_attr',
        'author',
        'location',
        'country',
        'subcountry',
        'city',
        'provider_group',
        'doc_type',
        'title',
        'pub_date',
        'fulltext_mode',
        'fulltext_source_link',
        'event_field',
        'fulltext_xpath',
        'fulltext_field',
        'selector',
        'source_keywords',
        'last_scraped',
        'description',
        'special_encoding',
        'top_source',
        'lock_hash',
        'scrape_all',
        'news_type',
        'created_by',
        'content_partner',
        'scraping_mode',
        'options',
        'first_document'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'health',
        'manual',
        'location_auto_find',
        'goose',
        'documents_count',
        'last_document',
        'source_link',
        'use_html',
        'list_css',
        'link_css',
        'title_css',
        'title_attr',
        'date_css',
        'date_attr',
        'author',
        'location',
        'country',
        'subcountry',
        'city',
        'provider_group',
        'doc_type',
        'title',
        'pub_date',
        'fulltext_mode',
        'fulltext_source_link',
        'event_field',
        'fulltext_xpath',
        'fulltext_field',
        'selector',
        'source_keywords',
        'last_scraped',
        'description',
        'special_encoding',
        'top_source',
        'lock_hash',
        'scrape_all',
        'news_type',
        'created_by',
        'content_partner',
        'scraping_mode',
        'options',
        'first_document',
        'provider_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'status',
        'health',
        'manual',
        'location_auto_find',
        'goose',
        'documents_count',
        'last_document',
        'source_link',
        'use_html',
        'list_css',
        'link_css',
        'title_css',
        'title_attr',
        'date_css',
        'date_attr',
        'author',
        'location',
        'country',
        'subcountry',
        'city',
        'provider_group',
        'doc_type',
        'title',
        'pub_date',
        'fulltext_mode',
        'fulltext_source_link',
        'event_field',
        'fulltext_xpath',
        'fulltext_field',
        'selector',
        'source_keywords',
        'last_scraped',
        'description',
        'special_encoding',
        'top_source',
        'lock_hash',
        'scrape_all',
        'news_type',
        'created_by',
        'content_partner',
        'scraping_mode',
        'options',
        'first_document'
    ];

    public $timestamps = true;

    public function feedsManuals(): HasMany
    {
        return $this->hasMany(FeedsManual::class, 'feed_id');
    }
    public function rssSubscriptions(): HasMany
    {
        return $this->hasMany(RssSubscription::class, 'feed_id');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
