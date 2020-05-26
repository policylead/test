<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamsList extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "teams_lists";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'users', 'bookmarks', 'contentPartners', 'dashboards', 'documentsComments', 'reports', 'reportsCustomDocuments', 'reportsCustomProviders', 'reportsMailingLists', 'reportsVersions', 'stakeholders'
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

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'team_id');
    }
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, 'team_id');
    }
    public function contentPartners(): HasMany
    {
        return $this->hasMany(ContentPartner::class, 'team_id');
    }
    public function dashboards(): HasMany
    {
        return $this->hasMany(Dashboard::class, 'team_id');
    }
    public function documentsComments(): HasMany
    {
        return $this->hasMany(DocumentsComment::class, 'team_id');
    }
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'team_id');
    }
    public function reportsCustomDocuments(): HasMany
    {
        return $this->hasMany(ReportsCustomDocument::class, 'team_id');
    }
    public function reportsCustomProviders(): HasMany
    {
        return $this->hasMany(ReportsCustomProvider::class, 'team_id');
    }
    public function reportsMailingLists(): HasMany
    {
        return $this->hasMany(ReportsMailingList::class, 'team_id');
    }
    public function reportsVersions(): HasMany
    {
        return $this->hasMany(ReportsVersion::class, 'team_id');
    }
    public function stakeholders(): HasMany
    {
        return $this->hasMany(Stakeholder::class, 'team_id');
    }
}
