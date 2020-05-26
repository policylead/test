<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportTemplate extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "report_templates";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'newsletterSubscriptions', 'reports'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'name',
        'emails',
        'chapters',
        'title',
        'author_name',
        'company_name',
        'enabled',
        'attach_pdf',
        'attach_html',
        'users',
        'teams'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'emails',
        'chapters',
        'title',
        'author_name',
        'company_name',
        'enabled',
        'attach_pdf',
        'attach_html',
        'users',
        'teams',
        'logo'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'name',
        'emails',
        'chapters',
        'title',
        'author_name',
        'company_name',
        'enabled',
        'attach_pdf',
        'attach_html',
        'users',
        'teams',
        'logo'
    ];

    public $timestamps = true;

    public function newsletterSubscriptions(): HasMany
    {
        return $this->hasMany(NewsletterSubscription::class, 'report_template_id');
    }
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'report_template_id');
    }
}
