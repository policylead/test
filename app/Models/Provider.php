<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "providers";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'documents', 'feeds'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'name',
        'provider_group_container',
        'provider_group_container_index',
        'country',
        'subcountry',
        'city',
        'feed_id',
        'social_media_type'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'provider_group_container',
        'provider_group_container_index',
        'country',
        'subcountry',
        'city',
        'feed_id',
        'social_media_type'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'name',
        'provider_group_container',
        'provider_group_container_index',
        'country',
        'subcountry',
        'city',
        'feed_id',
        'social_media_type'
    ];

    public $timestamps = true;

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'provider_id');
    }
    public function feeds(): HasMany
    {
        return $this->hasMany(Feed::class, 'provider_id');
    }
}
