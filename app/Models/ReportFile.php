<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportFile extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "report_files";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'user'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'type',
        'title',
        'author',
        'fulltext',
        'bill_keywords',
        'related_records',
        'email1',
        'full_name',
        'birth_date',
        'profession',
        'abbr',
        'mailbox_street_address_parliament',
        'zip_code_parliament',
        'city_parliament',
        'profile_picture',
        'personal_site',
        'political_bodies',
        'employee_parliament',
        'fraction',
        'zip_code_wk',
        'city_wk',
        'biography',
        'phone_code_parliament',
        'phone_number_parliament',
        'fax_number_parliament',
        'text_section',
        'abstract',
        'provider',
        'provider_group',
        'doc_type'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'title',
        'author',
        'fulltext',
        'bill_keywords',
        'related_records',
        'email1',
        'full_name',
        'birth_date',
        'profession',
        'abbr',
        'mailbox_street_address_parliament',
        'zip_code_parliament',
        'city_parliament',
        'profile_picture',
        'personal_site',
        'political_bodies',
        'employee_parliament',
        'fraction',
        'zip_code_wk',
        'city_wk',
        'biography',
        'phone_code_parliament',
        'phone_number_parliament',
        'fax_number_parliament',
        'text_section',
        'abstract',
        'provider',
        'provider_group',
        'doc_type',
        'user_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'type',
        'title',
        'author',
        'fulltext',
        'bill_keywords',
        'related_records',
        'email1',
        'full_name',
        'birth_date',
        'profession',
        'abbr',
        'mailbox_street_address_parliament',
        'zip_code_parliament',
        'city_parliament',
        'profile_picture',
        'personal_site',
        'political_bodies',
        'employee_parliament',
        'fraction',
        'zip_code_wk',
        'city_wk',
        'biography',
        'phone_code_parliament',
        'phone_number_parliament',
        'fax_number_parliament',
        'text_section',
        'abstract',
        'provider',
        'provider_group',
        'doc_type'
    ];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
