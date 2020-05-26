<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportsMailingList extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "reports_mailing_lists";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'newsletterSubscriptions', 'reportsScheduleds', 'user', 'team'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'name',
        'emails'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'emails',
        'user_id',
        'team_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'name',
        'emails'
    ];

    public $timestamps = true;

    public function newsletterSubscriptions(): HasMany
    {
        return $this->hasMany(NewsletterSubscription::class, 'report_mailing_list_id');
    }
    public function reportsScheduleds(): HasMany
    {
        return $this->hasMany(ReportsScheduled::class, 'list_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(TeamsList::class, 'team_id');
    }
}
