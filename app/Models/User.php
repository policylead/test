<?php

namespace App\Models;

use App\Models\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanResetPasswordContract
{
    use Notifiable, SoftDeletes, SearchTrait;
    use HasApiTokens, CanResetPassword, HasRoles;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'alerts', 'billings', 'bookmarks', 'clientFeeds', 'contentPartners', 'dashboards', 'dashboardsSettings', 'documentCounts', 'documentsComments', 'emailClicks', 'eventEmailClicks', 'reportFiles', 'reports', 'reportsCustomDocuments', 'reportsCustomProviders', 'reportsMailingLists', 'revisions', 'sentEventAlerts', 'stakeholders', 'userDocRequests', 'userLimits', 'team', 'interests'
    ];

    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = [
        'id',
        'email',
        'first_name',
        'remember_token',
        'last_name',
        'full_name',
        'role',
        'agency_name',
        'office_name',
        'press_releases',
        'homepage',
        'university_id',
        'subject_area_id',
        'blog',
        'employee',
        'tel',
        'terms_and_conditions',
        'verified',
        'verification_token',
        'lead_type',
        'profile_photo',
        'student_card',
        'test_period',
        'client_status',
        'data_filled',
        'approved',
        'alert_providers',
        'alert_frequency',
        'alert_weekday',
        'blocked_documents',
        'first_alert',
        'second_alert',
        'newsdesk_provider_filter',
        'personal_email_for_reports',
        'settings_1to1_support',
        'settings_newsdesk_support',
        'settings_click_tracking_reports',
        'settings_click_tracking_other',
        'settings_newsletter_features',
        'settings_newsletter_expired',
        'settings_reconnect',
        'custom_sender_email',
        'custom_sender_name',
        'client_feeds_enabled',
        'language',
        'salutation'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'remember_token',
        'last_name',
        'full_name',
        'role',
        'agency_name',
        'office_name',
        'press_releases',
        'homepage',
        'university_id',
        'subject_area_id',
        'blog',
        'employee',
        'tel',
        'terms_and_conditions',
        'verified',
        'verification_token',
        'lead_type',
        'profile_photo',
        'student_card',
        'test_period',
        'client_status',
        'data_filled',
        'approved',
        'alert_providers',
        'alert_frequency',
        'alert_weekday',
        'blocked_documents',
        'first_alert',
        'second_alert',
        'newsdesk_provider_filter',
        'personal_email_for_reports',
        'settings_1to1_support',
        'settings_newsdesk_support',
        'settings_click_tracking_reports',
        'settings_click_tracking_other',
        'settings_newsletter_features',
        'settings_newsletter_expired',
        'settings_reconnect',
        'custom_sender_email',
        'custom_sender_name',
        'client_feeds_enabled',
        'language',
        'salutation',
        'team_id'
    ];

    /**
     * The attributes that are will be sent to front-end
     *
     * @var array
     */
    protected $visible = [
        'id',
        'email',
        'first_name',
        'remember_token',
        'last_name',
        'full_name',
        'role',
        'agency_name',
        'office_name',
        'press_releases',
        'homepage',
        'university_id',
        'subject_area_id',
        'blog',
        'employee',
        'tel',
        'terms_and_conditions',
        'verified',
        'verification_token',
        'lead_type',
        'profile_photo',
        'student_card',
        'test_period',
        'client_status',
        'data_filled',
        'approved',
        'alert_providers',
        'alert_frequency',
        'alert_weekday',
        'blocked_documents',
        'first_alert',
        'second_alert',
        'newsdesk_provider_filter',
        'personal_email_for_reports',
        'settings_1to1_support',
        'settings_newsdesk_support',
        'settings_click_tracking_reports',
        'settings_click_tracking_other',
        'settings_newsletter_features',
        'settings_newsletter_expired',
        'settings_reconnect',
        'custom_sender_email',
        'custom_sender_name',
        'client_feeds_enabled',
        'language',
        'salutation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        ResetPasswordNotification::$createUrlCallback = function ($notifiable, $passedToken) {
            return config('app.spa.reset_password_url') .
                "/$passedToken?email={$notifiable->getEmailForPasswordReset()}";
        };

        $this->notify(new ResetPasswordNotification($token));
    }

    public function alerts(): HasMany
    {
        return $this->hasMany(Alert::class, 'user_id');
    }
    public function billings(): HasMany
    {
        return $this->hasMany(Billing::class, 'user_id');
    }
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }
    public function clientFeeds(): HasMany
    {
        return $this->hasMany(ClientFeed::class, 'user_id');
    }
    public function contentPartners(): HasMany
    {
        return $this->hasMany(ContentPartner::class, 'user_id');
    }
    public function dashboards(): HasMany
    {
        return $this->hasMany(Dashboard::class, 'user_id');
    }
    public function dashboardsSettings(): HasMany
    {
        return $this->hasMany(DashboardsSetting::class, 'user_id');
    }
    public function documentCounts(): HasMany
    {
        return $this->hasMany(DocumentCount::class, 'user_id');
    }
    public function documentsComments(): HasMany
    {
        return $this->hasMany(DocumentsComment::class, 'user_id');
    }
    public function emailClicks(): HasMany
    {
        return $this->hasMany(EmailClick::class, 'user_id');
    }
    public function eventEmailClicks(): HasMany
    {
        return $this->hasMany(EventEmailClick::class, 'user_id');
    }
    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(
            Interest::class,
            'interest_users',
            'user_id',
            'interest_id'
        )->withTimestamps();
    }
    public function reportFiles(): HasMany
    {
        return $this->hasMany(ReportFile::class, 'user_id');
    }
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'user_id');
    }
    public function reportsCustomDocuments(): HasMany
    {
        return $this->hasMany(ReportsCustomDocument::class, 'user_id');
    }
    public function reportsCustomProviders(): HasMany
    {
        return $this->hasMany(ReportsCustomProvider::class, 'user_id');
    }
    public function reportsMailingLists(): HasMany
    {
        return $this->hasMany(ReportsMailingList::class, 'user_id');
    }
    public function revisions(): HasMany
    {
        return $this->hasMany(Revision::class, 'user_id');
    }
    public function sentEventAlerts(): HasMany
    {
        return $this->hasMany(SentEventAlert::class, 'user_id');
    }
    public function stakeholders(): HasMany
    {
        return $this->hasMany(Stakeholder::class, 'user_id');
    }
    public function userDocRequests(): HasMany
    {
        return $this->hasMany(UserDocRequest::class, 'user_id');
    }
    public function userLimits(): HasMany
    {
        return $this->hasMany(UserLimit::class, 'user_id');
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(TeamsList::class, 'team_id');
    }
}
