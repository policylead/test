<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "reports";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'clientFeedReportAssociations', 'reportsEmailClicks', 'reportsScheduleds', 'reportsVersions', 'user', 'author', 'team', 'reportTemplate'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'title',
        'layout',
        'logo',
        'author',
        'company_name',
        'published_at',
        'content',
        'emails',
        'attach_pdf',
        'attach_html',
        'last_edited',
        'report_image_description',
        'published',
        'sent_at',
        'template',
        'template_options'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'layout',
        'logo',
        'author',
        'company_name',
        'published_at',
        'content',
        'emails',
        'attach_pdf',
        'attach_html',
        'last_edited',
        'report_image_description',
        'published',
        'sent_at',
        'template',
        'template_options',
        'user_id',
        'author_id',
        'team_id',
        'report_template_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'title',
        'layout',
        'logo',
        'author',
        'company_name',
        'published_at',
        'content',
        'emails',
        'attach_pdf',
        'attach_html',
        'last_edited',
        'report_image_description',
        'published',
        'sent_at',
        'template',
        'template_options'
    ];

    public $timestamps = true;

    public function clientFeedReportAssociations(): HasMany
    {
        return $this->hasMany(ClientFeedReportAssociation::class, 'report_id');
    }
    public function reportsEmailClicks(): HasMany
    {
        return $this->hasMany(ReportsEmailClick::class, 'report_id');
    }
    public function reportsScheduleds(): HasMany
    {
        return $this->hasMany(ReportsScheduled::class, 'report_id');
    }
    public function reportsVersions(): HasMany
    {
        return $this->hasMany(ReportsVersion::class, 'report_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(TeamsList::class, 'team_id');
    }
    public function reportTemplate(): BelongsTo
    {
        return $this->belongsTo(ReportTemplate::class, 'report_template_id');
    }
}
