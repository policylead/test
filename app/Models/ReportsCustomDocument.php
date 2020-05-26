<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportsCustomDocument extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "reports_custom_documents";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'user', 'team'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'doc_title',
        'pubdate_source',
        'provider',
        'author',
        'teaser',
        'fulltext',
        'doc_link',
        'public_link',
        'article_image_description',
        'article_image_size',
        'used',
        'fulltext_columns',
        'type',
        'further_publications',
        'deactivated_link'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doc_title',
        'pubdate_source',
        'provider',
        'author',
        'teaser',
        'fulltext',
        'doc_link',
        'public_link',
        'article_image_description',
        'article_image_size',
        'used',
        'fulltext_columns',
        'type',
        'further_publications',
        'deactivated_link',
        'user_id',
        'team_id',
        'provider_logo',
        'article_image'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'doc_title',
        'pubdate_source',
        'provider',
        'author',
        'teaser',
        'fulltext',
        'doc_link',
        'public_link',
        'article_image_description',
        'article_image_size',
        'used',
        'fulltext_columns',
        'type',
        'further_publications',
        'deactivated_link',
        'provider_logo',
        'article_image'
    ];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(TeamsList::class, 'team_id');
    }
}
