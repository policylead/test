<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StakeholdersList extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "stakeholders_lists";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'stakeholder', 'author', 'stakeholderData'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'name'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'author_id',
        'stakeholders_data_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'name'
    ];

    public $timestamps = false;

    public function stakeholder(): BelongsTo
    {
        return $this->belongsTo(Stakeholder::class, 'parent_id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function stakeholderData(): BelongsTo
    {
        return $this->belongsTo(StakeholdersDatum::class, 'stakeholders_data_id');
    }
}
