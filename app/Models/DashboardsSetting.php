<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class DashboardsSetting extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "dashboards_settings";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'user', 'dashboard'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'active',
        'first_alert',
        'second_alert',
        'delay_time',
        'last_sent',
        'alert_frequency',
        'alert_weekday',
        'channels',
        'push_alert',
        'push_monday',
        'push_tuesday',
        'push_wednesday',
        'push_thursday',
        'push_friday',
        'push_saturday',
        'push_sunday',
        'push_from',
        'push_to',
        'push_type'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'first_alert',
        'second_alert',
        'delay_time',
        'last_sent',
        'alert_frequency',
        'alert_weekday',
        'channels',
        'push_alert',
        'push_monday',
        'push_tuesday',
        'push_wednesday',
        'push_thursday',
        'push_friday',
        'push_saturday',
        'push_sunday',
        'push_from',
        'push_to',
        'push_type',
        'user_id',
        'dashboard_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'active',
        'first_alert',
        'second_alert',
        'delay_time',
        'last_sent',
        'alert_frequency',
        'alert_weekday',
        'channels',
        'push_alert',
        'push_monday',
        'push_tuesday',
        'push_wednesday',
        'push_thursday',
        'push_friday',
        'push_saturday',
        'push_sunday',
        'push_from',
        'push_to',
        'push_type'
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function dashboard(): BelongsTo
    {
        return $this->belongsTo(Dashboard::class, 'dashboard_id');
    }
}
