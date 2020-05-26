<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    private const MODULES = [
        'auth',
        'alert',
        'author',
        'billing',
        'bookmark',
        'clientfeedreportassociation',
        'clientfeed',
        'contentpartner',
        'dashboard',
        'dashboardskeyword',
        'dashboardssetting',
        'doctype',
        'documentcount',
        'document',
        'documentscomment',
        'documentstemp',
        'emailclick',
        'eventemailclick',
        'facebookaccount',
        'feed',
        'feedsduplicate',
        'feedsmanual',
        'interest',
        'newslettersubscription',
        'provider',
        'reportfile',
        'reporttemplate',
        'report',
        'reportscustomdocumentimage',
        'reportscustomdocument',
        'reportscustomprovider',
        'reportsemailclick',
        'reportsmailinglist',
        'reportsscheduled',
        'reportsversion',
        'revision',
        'rsssubscription',
        'sentemailalert',
        'senteventalert',
        'smslink',
        'stakeholder',
        'stakeholdersdatum',
        'stakeholderskeyword',
        'stakeholderslist',
        'stock',
        'subjectarea',
        'taggingtagged',
        'taggingtag',
        'teamslist',
        'twitteraccount',
        'university',
        'userdocrequest',
        'userlimit',
        'user',
        'password_reset'
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace("{$this->namespace}\Api")
             ->group(base_path('routes/api.php'));

        foreach (self::MODULES as $module) {
            Route::prefix('api')
                ->middleware('api')
                ->namespace("{$this->namespace}\Api")
                ->group(base_path("routes/modules/{$module}.php"));
        }
    }
}
