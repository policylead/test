<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\ContentPartner\ContentPartnerCollection;
use App\Http\Resources\Dashboard\DashboardCollection;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\ReportsCustomDocument\ReportsCustomDocumentCollection;
use App\Http\Resources\ReportsCustomProvider\ReportsCustomProviderCollection;
use App\Http\Resources\ReportsMailingList\ReportsMailingListCollection;
use App\Http\Resources\ReportsVersion\ReportsVersionCollection;
use App\Http\Resources\Stakeholder\StakeholderCollection;
use App\Http\Resources\TeamsList\TeamsListResource;
use App\Http\Resources\TeamsList\TeamsListCollection;
use App\Http\Requests\TeamsList\StoreTeamsListRequest;
use App\Http\Requests\TeamsList\UpdateTeamsListRequest;
use App\Models\TeamsList;
use App\Models\User;
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

/**
 * @group TeamsList
 *
 * Endpoints for TeamsList entity
 */
class TeamsListController extends Controller
{

    /**
     * Create a new TeamsListController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Get paginated items, included advanced REST querying
     *
     * Display a listing of the item.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', TeamsList::class);

        $teams_lists = TeamsList::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new TeamsListCollection($teams_lists));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreTeamsListRequest  $request
     * @return JsonResponse
     */
    public function store(StoreTeamsListRequest $request): JsonResponse
    {
        $this->authorize('create', TeamsList::class);

        $teams_list = $request->fill(new TeamsList);

        $teams_list->save();
        $teams_list->loadIncludes();

        return response()->resource(new TeamsListResource($teams_list))
                ->message(__('crud.create', ['item' => __('model.TeamsList')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateTeamsListRequest  $request
     * @param  TeamsList $teams_list
     * @return JsonResponse
     */
    public function update(UpdateTeamsListRequest $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('update', $teams_list);

        $request->fill($teams_list);
        
        $teams_list->update();
        $teams_list->loadIncludes();

        return response()->resource(new TeamsListResource($teams_list))
                ->message(__('crud.update', ['item' => __('model.TeamsList')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  TeamsList $teams_list
     * @return JsonResponse
     */
    public function show(TeamsList $teams_list): JsonResponse
    {
        $this->authorize('view', $teams_list);

        $teams_list->loadIncludes();

        return response()->resource(new TeamsListResource($teams_list));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  TeamsList  $teams_list
     * @return  JsonResponse
     */
    public function destroy(TeamsList $teams_list): JsonResponse
    {
        $this->authorize('delete', $teams_list);

        $teams_list->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.TeamsList')]));
    }

    /**
     * Search Users for TeamsList with given $id
     *
     * Users from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchUsers(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchUsers', $teams_list);

        $users = $teams_list->users()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UserCollection($users));
    }

    /**
     * Search Bookmarks for TeamsList with given $id
     *
     * Bookmarks from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchBookmarks(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchBookmarks', $teams_list);

        $bookmarks = $teams_list->bookmarks()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BookmarkCollection($bookmarks));
    }

    /**
     * Search ContentPartners for TeamsList with given $id
     *
     * ContentPartners from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchContentPartners(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchContentPartners', $teams_list);

        $contentPartners = $teams_list->contentPartners()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ContentPartnerCollection($contentPartners));
    }

    /**
     * Search Dashboards for TeamsList with given $id
     *
     * Dashboards from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchDashboards(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchDashboards', $teams_list);

        $dashboards = $teams_list->dashboards()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardCollection($dashboards));
    }

    /**
     * Search DocumentsComments for TeamsList with given $id
     *
     * DocumentsComments from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchDocumentsComments(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchDocumentsComments', $teams_list);

        $documentsComments = $teams_list->documentsComments()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentsCommentCollection($documentsComments));
    }

    /**
     * Search Reports for TeamsList with given $id
     *
     * Reports from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchReports(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchReports', $teams_list);

        $reports = $teams_list->reports()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportCollection($reports));
    }

    /**
     * Search ReportsCustomDocuments for TeamsList with given $id
     *
     * ReportsCustomDocuments from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchReportsCustomDocuments(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchReportsCustomDocuments', $teams_list);

        $reportsCustomDocuments = $teams_list->reportsCustomDocuments()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomDocumentCollection($reportsCustomDocuments));
    }

    /**
     * Search ReportsCustomProviders for TeamsList with given $id
     *
     * ReportsCustomProviders from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchReportsCustomProviders(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchReportsCustomProviders', $teams_list);

        $reportsCustomProviders = $teams_list->reportsCustomProviders()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomProviderCollection($reportsCustomProviders));
    }

    /**
     * Search ReportsMailingLists for TeamsList with given $id
     *
     * ReportsMailingLists from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchReportsMailingLists(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchReportsMailingLists', $teams_list);

        $reportsMailingLists = $teams_list->reportsMailingLists()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsMailingListCollection($reportsMailingLists));
    }

    /**
     * Search ReportsVersions for TeamsList with given $id
     *
     * ReportsVersions from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchReportsVersions(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchReportsVersions', $teams_list);

        $reportsVersions = $teams_list->reportsVersions()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsVersionCollection($reportsVersions));
    }

    /**
     * Search Stakeholders for TeamsList with given $id
     *
     * Stakeholders from existing resource.
     *
     * @param Request $request
     * @param TeamsList $teams_list
     * @return JsonResponse
     */
    public function searchStakeholders(Request $request, TeamsList $teams_list): JsonResponse
    {
        $this->authorize('searchStakeholders', $teams_list);

        $stakeholders = $teams_list->stakeholders()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholderCollection($stakeholders));
    }
}
