<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectArea extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "subject_areas";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        
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
        'name'
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

    public $timestamps = true;
}
