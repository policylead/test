<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StakeholdersDatum extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "stakeholders_datas";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'stakeholdersLists'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'description',
        'location',
        'abbr',
        'facebook',
        'twitter',
        'political_bodies',
        'parliament',
        'alias',
        'authority',
        'use_alias_only',
        'name'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'location',
        'abbr',
        'facebook',
        'twitter',
        'political_bodies',
        'parliament',
        'alias',
        'authority',
        'use_alias_only',
        'name',
        'backup_picture'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'description',
        'location',
        'abbr',
        'facebook',
        'twitter',
        'political_bodies',
        'parliament',
        'alias',
        'authority',
        'use_alias_only',
        'name',
        'backup_picture'
    ];

    public $timestamps = false;

    public function stakeholdersLists(): HasMany
    {
        return $this->hasMany(StakeholdersList::class, 'stakeholders_data_id');
    }
}
