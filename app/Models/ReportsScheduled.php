<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportsScheduled extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "reports_scheduleds";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'report', 'reportsMailingList'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'emails',
        'sender_email',
        'custom_sender_email',
        'custom_sender_name',
        'subject',
        'keywords',
        'message',
        'attach_pdf',
        'send_as_html',
        'sent',
        'created_at',
        'lock_hash'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emails',
        'sender_email',
        'custom_sender_email',
        'custom_sender_name',
        'subject',
        'keywords',
        'message',
        'attach_pdf',
        'send_as_html',
        'sent',
        'created_at',
        'lock_hash',
        'report_id',
        'list_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'emails',
        'sender_email',
        'custom_sender_email',
        'custom_sender_name',
        'subject',
        'keywords',
        'message',
        'attach_pdf',
        'send_as_html',
        'sent',
        'created_at',
        'lock_hash'
    ];

    public $timestamps = false;

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
    public function reportsMailingList(): BelongsTo
    {
        return $this->belongsTo(ReportsMailingList::class, 'list_id');
    }
}
