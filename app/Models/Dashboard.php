<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dashboard extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "dashboards";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'bookmarks', 'dashboardsKeywords', 'dashboardsSettings', 'sentEmailAlerts', 'user', 'team'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'name',
        'email',
        'active',
        'delay_time',
        'last_sent',
        'keywords',
        'first_alert',
        'second_alert',
        'alert_frequency',
        'alert_weekday',
        'edited_by',
        'locked_time',
        'locked_by',
        'dashboard_type'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'active',
        'delay_time',
        'last_sent',
        'keywords',
        'first_alert',
        'second_alert',
        'alert_frequency',
        'alert_weekday',
        'edited_by',
        'locked_time',
        'locked_by',
        'dashboard_type',
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
        'email',
        'active',
        'delay_time',
        'last_sent',
        'keywords',
        'first_alert',
        'second_alert',
        'alert_frequency',
        'alert_weekday',
        'edited_by',
        'locked_time',
        'locked_by',
        'dashboard_type'
    ];

    public $timestamps = true;

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, 'newsdesk_id');
    }
    public function dashboardsKeywords(): HasMany
    {
        return $this->hasMany(DashboardsKeyword::class, 'dashboard_id');
    }
    public function dashboardsSettings(): HasMany
    {
        return $this->hasMany(DashboardsSetting::class, 'dashboard_id');
    }
    public function sentEmailAlerts(): HasMany
    {
        return $this->hasMany(SentEmailAlert::class, 'dashboard_id');
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
