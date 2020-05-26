<?php

namespace App\Policies;

use App\Models\TeamsList;
use App\Models\Bookmark;
use App\Models\ContentPartner;
use App\Models\Dashboard;
use App\Models\DocumentsComment;
use App\Models\Report;
use App\Models\ReportsCustomDocument;
use App\Models\ReportsCustomProvider;
use App\Models\ReportsMailingList;
use App\Models\ReportsVersion;
use App\Models\Stakeholder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TeamsListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->can('team-list-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function view(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-view')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('team-list-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function update(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function delete(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchUsers(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-users')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchBookmarks(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-bookmarks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchContentPartners(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-content-partners')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchDashboards(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-dashboards')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchDocumentsComments(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-documents-comments')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchReports(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-reports')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchReportsCustomDocuments(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-reports-custom-documents')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchReportsCustomProviders(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-reports-custom-providers')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchReportsMailingLists(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-reports-mailing-lists')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchReportsVersions(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-reports-versions')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  TeamsList $teams_list
     * @return mixed
     */
    public function searchStakeholders(User $user, TeamsList $teams_list)
    {
        if ($user->can('team-list-search-stakeholders')) {
            return Response::allow();
        }
    }
}
