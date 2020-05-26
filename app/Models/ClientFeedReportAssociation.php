<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientFeedReportAssociation extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "client_feed_report_associations";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'clientFeed', 'report'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'title_template',
        'description_template',
        'link_template',
        'author_template',
        'pubdate_template',
        'category_template'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_template',
        'description_template',
        'link_template',
        'author_template',
        'pubdate_template',
        'category_template',
        'client_feed_id',
        'report_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'title_template',
        'description_template',
        'link_template',
        'author_template',
        'pubdate_template',
        'category_template'
    ];

    public $timestamps = true;

    public function clientFeed(): BelongsTo
    {
        return $this->belongsTo(ClientFeed::class, 'client_feed_id');
    }
    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
