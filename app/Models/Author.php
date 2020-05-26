<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SearchTrait;
    
    /*
     * Items per page (default=100)
     */
    protected $perPage = 10;

    protected $table = "authors";

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'reports', 'stakeholdersLists', 'authorDocuments', 'personDocuments'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'marital_status_title',
        'first_name',
        'full_name',
        'last_name',
        'title',
        'parliament',
        'abbr',
        'sex',
        'profile_photo',
        'fraction',
        'biography',
        'profession',
        'birthplace',
        'birth_date',
        'children',
        'denomination',
        'marital_status',
        'email1',
        'email2',
        'personal_site',
        'political_bodies',
        'parliament_membership',
        'election_result',
        'federal_state',
        'official_function',
        'parliament_2',
        'additional_address_parliament',
        'mailbox_street_address_parliament',
        'zip_code_parliament',
        'city_parliament',
        'eu_member_country_parliament',
        'phone_code_parliament',
        'phone_number_parliament',
        'fax_code_number_parliament',
        'fax_number_parliament',
        'ministry_request_reg',
        'additional_address_reg',
        'mailbox_street_address_reg',
        'zip_code_reg',
        'city_reg',
        'eu_member_country_reg',
        'phone_code_reg',
        'phone_number_reg',
        'fax_code_number_reg',
        'fax_number_reg',
        'constituency_private',
        'additional_address_wk',
        'mailbox_street_address_wk',
        'zip_code_wk',
        'city_wk',
        'eu_member_country_wk',
        'phone_code_wk',
        'phone_number_wk',
        'fax_code_number_wk',
        'fax_number_wk',
        'employ_parliament',
        'employ_reg',
        'employ_wk',
        'e_n_g_l_a_n_r_e_d_e',
        'networks',
        'twitter',
        'facebook',
        'period',
        'qualification',
        'election_list',
        'avatar',
        'twitter_avatar',
        'facebook_avatar',
        'last_check',
        'institution'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marital_status_title',
        'first_name',
        'full_name',
        'last_name',
        'title',
        'parliament',
        'abbr',
        'sex',
        'profile_photo',
        'fraction',
        'biography',
        'profession',
        'birthplace',
        'birth_date',
        'children',
        'denomination',
        'marital_status',
        'email1',
        'email2',
        'personal_site',
        'political_bodies',
        'parliament_membership',
        'election_result',
        'federal_state',
        'official_function',
        'parliament_2',
        'additional_address_parliament',
        'mailbox_street_address_parliament',
        'zip_code_parliament',
        'city_parliament',
        'eu_member_country_parliament',
        'phone_code_parliament',
        'phone_number_parliament',
        'fax_code_number_parliament',
        'fax_number_parliament',
        'ministry_request_reg',
        'additional_address_reg',
        'mailbox_street_address_reg',
        'zip_code_reg',
        'city_reg',
        'eu_member_country_reg',
        'phone_code_reg',
        'phone_number_reg',
        'fax_code_number_reg',
        'fax_number_reg',
        'constituency_private',
        'additional_address_wk',
        'mailbox_street_address_wk',
        'zip_code_wk',
        'city_wk',
        'eu_member_country_wk',
        'phone_code_wk',
        'phone_number_wk',
        'fax_code_number_wk',
        'fax_number_wk',
        'employ_parliament',
        'employ_reg',
        'employ_wk',
        'e_n_g_l_a_n_r_e_d_e',
        'networks',
        'twitter',
        'facebook',
        'period',
        'qualification',
        'election_list',
        'avatar',
        'twitter_avatar',
        'facebook_avatar',
        'last_check',
        'institution'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'marital_status_title',
        'first_name',
        'full_name',
        'last_name',
        'title',
        'parliament',
        'abbr',
        'sex',
        'profile_photo',
        'fraction',
        'biography',
        'profession',
        'birthplace',
        'birth_date',
        'children',
        'denomination',
        'marital_status',
        'email1',
        'email2',
        'personal_site',
        'political_bodies',
        'parliament_membership',
        'election_result',
        'federal_state',
        'official_function',
        'parliament_2',
        'additional_address_parliament',
        'mailbox_street_address_parliament',
        'zip_code_parliament',
        'city_parliament',
        'eu_member_country_parliament',
        'phone_code_parliament',
        'phone_number_parliament',
        'fax_code_number_parliament',
        'fax_number_parliament',
        'ministry_request_reg',
        'additional_address_reg',
        'mailbox_street_address_reg',
        'zip_code_reg',
        'city_reg',
        'eu_member_country_reg',
        'phone_code_reg',
        'phone_number_reg',
        'fax_code_number_reg',
        'fax_number_reg',
        'constituency_private',
        'additional_address_wk',
        'mailbox_street_address_wk',
        'zip_code_wk',
        'city_wk',
        'eu_member_country_wk',
        'phone_code_wk',
        'phone_number_wk',
        'fax_code_number_wk',
        'fax_number_wk',
        'employ_parliament',
        'employ_reg',
        'employ_wk',
        'e_n_g_l_a_n_r_e_d_e',
        'networks',
        'twitter',
        'facebook',
        'period',
        'qualification',
        'election_list',
        'avatar',
        'twitter_avatar',
        'facebook_avatar',
        'last_check',
        'institution'
    ];

    public $timestamps = true;

    public function authorDocuments(): BelongsToMany
    {
        return $this->belongsToMany(
            Document::class,
            'person_documents',
            'person_id',
            'document_id'
        )->withTimestamps();
    }
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'author_id');
    }
    public function stakeholdersLists(): HasMany
    {
        return $this->hasMany(StakeholdersList::class, 'author_id');
    }
    public function personDocuments(): BelongsToMany
    {
        return $this->belongsToMany(
            Document::class,
            'author_documents',
            'author_id',
            'document_id'
        )->withTimestamps();
    }
}
