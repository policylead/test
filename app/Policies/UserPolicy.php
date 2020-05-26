<?php

namespace App\Policies;

use App\Models\Interest;
use App\Models\Alert;
use App\Models\Billing;
use App\Models\Bookmark;
use App\Models\ClientFeed;
use App\Models\ContentPartner;
use App\Models\Dashboard;
use App\Models\DashboardsSetting;
use App\Models\DocumentCount;
use App\Models\DocumentsComment;
use App\Models\EmailClick;
use App\Models\EventEmailClick;
use App\Models\ReportFile;
use App\Models\Report;
use App\Models\ReportsCustomDocument;
use App\Models\ReportsCustomProvider;
use App\Models\ReportsMailingList;
use App\Models\Revision;
use App\Models\SentEventAlert;
use App\Models\Stakeholder;
use App\Models\UserDocRequest;
use App\Models\UserLimit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function update(User $user, User $auth)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchInterests(User $user, User $auth)
    {
        if ($user->can('user-search-interests')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can attach new relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @param  Interest $interest
     * @return mixed
     */
    public function attachInterest(User $user, User $auth, Interest $interest)
    {
        if ($user->can('user-attach-interest')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can detach new relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @param  Interest $interest
     * @return mixed
     */
    public function detachInterest(User $user, User $auth, Interest $interest)
    {
        if ($user->can('user-detach-interest')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchAlerts(User $user, User $auth)
    {
        if ($user->can('user-search-alerts')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchBillings(User $user, User $auth)
    {
        if ($user->can('user-search-billings')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchBookmarks(User $user, User $auth)
    {
        if ($user->can('user-search-bookmarks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchClientFeeds(User $user, User $auth)
    {
        if ($user->can('user-search-client-feeds')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchContentPartners(User $user, User $auth)
    {
        if ($user->can('user-search-content-partners')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchDashboards(User $user, User $auth)
    {
        if ($user->can('user-search-dashboards')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchDashboardsSettings(User $user, User $auth)
    {
        if ($user->can('user-search-dashboards-settings')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchDocumentCounts(User $user, User $auth)
    {
        if ($user->can('user-search-document-counts')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchDocumentsComments(User $user, User $auth)
    {
        if ($user->can('user-search-documents-comments')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchEmailClicks(User $user, User $auth)
    {
        if ($user->can('user-search-email-clicks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchEventEmailClicks(User $user, User $auth)
    {
        if ($user->can('user-search-event-email-clicks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchReportFiles(User $user, User $auth)
    {
        if ($user->can('user-search-report-files')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchReports(User $user, User $auth)
    {
        if ($user->can('user-search-reports')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchReportsCustomDocuments(User $user, User $auth)
    {
        if ($user->can('user-search-reports-custom-documents')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchReportsCustomProviders(User $user, User $auth)
    {
        if ($user->can('user-search-reports-custom-providers')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchReportsMailingLists(User $user, User $auth)
    {
        if ($user->can('user-search-reports-mailing-lists')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchRevisions(User $user, User $auth)
    {
        if ($user->can('user-search-revisions')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchSentEventAlerts(User $user, User $auth)
    {
        if ($user->can('user-search-sent-event-alerts')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchStakeholders(User $user, User $auth)
    {
        if ($user->can('user-search-stakeholders')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchUserDocRequests(User $user, User $auth)
    {
        if ($user->can('user-search-user-doc-requests')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  User $auth
     * @return mixed
     */
    public function searchUserLimits(User $user, User $auth)
    {
        if ($user->can('user-search-user-limits')) {
            return Response::allow();
        }
    }
}
