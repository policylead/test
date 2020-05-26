<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\DashboardsKeyword\DashboardsKeywordCollection;
use App\Http\Resources\DashboardsSetting\DashboardsSettingCollection;
use App\Http\Resources\SentEmailAlert\SentEmailAlertCollection;
use App\Http\Resources\Dashboard\DashboardResource;
use App\Http\Resources\Dashboard\DashboardCollection;
use App\Http\Requests\Dashboard\StoreDashboardRequest;
use App\Http\Requests\Dashboard\UpdateDashboardRequest;
use App\Models\Dashboard;
use App\Models\Bookmark;
use App\Models\DashboardsKeyword;
use App\Models\DashboardsSetting;
use App\Models\SentEmailAlert;

/**
 * @group Dashboard
 *
 * Endpoints for Dashboard entity
 */
class DashboardController extends Controller
{

    /**
     * Create a new DashboardController instance.
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
        $this->authorize('viewAny', Dashboard::class);

        $dashboards = Dashboard::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardCollection($dashboards));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDashboardRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDashboardRequest $request): JsonResponse
    {
        $this->authorize('create', Dashboard::class);

        $dashboard = $request->fill(new Dashboard);

        $dashboard->user_id = auth()->user()->id;

        $dashboard->save();
        $dashboard->loadIncludes();

        return response()->resource(new DashboardResource($dashboard))
                ->message(__('crud.create', ['item' => __('model.Dashboard')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDashboardRequest  $request
     * @param  Dashboard $dashboard
     * @return JsonResponse
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard): JsonResponse
    {
        $this->authorize('update', $dashboard);

        $request->fill($dashboard);
        
        $dashboard->update();
        $dashboard->loadIncludes();

        return response()->resource(new DashboardResource($dashboard))
                ->message(__('crud.update', ['item' => __('model.Dashboard')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Dashboard $dashboard
     * @return JsonResponse
     */
    public function show(Dashboard $dashboard): JsonResponse
    {
        $this->authorize('view', $dashboard);

        $dashboard->loadIncludes();

        return response()->resource(new DashboardResource($dashboard));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Dashboard  $dashboard
     * @return  JsonResponse
     */
    public function destroy(Dashboard $dashboard): JsonResponse
    {
        $this->authorize('delete', $dashboard);

        $dashboard->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Dashboard')]));
    }

    /**
     * Search Bookmarks for Dashboard with given $id
     *
     * Bookmarks from existing resource.
     *
     * @param Request $request
     * @param Dashboard $dashboard
     * @return JsonResponse
     */
    public function searchBookmarks(Request $request, Dashboard $dashboard): JsonResponse
    {
        $this->authorize('searchBookmarks', $dashboard);

        $bookmarks = $dashboard->bookmarks()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BookmarkCollection($bookmarks));
    }

    /**
     * Search DashboardsKeywords for Dashboard with given $id
     *
     * DashboardsKeywords from existing resource.
     *
     * @param Request $request
     * @param Dashboard $dashboard
     * @return JsonResponse
     */
    public function searchDashboardsKeywords(Request $request, Dashboard $dashboard): JsonResponse
    {
        $this->authorize('searchDashboardsKeywords', $dashboard);

        $dashboardsKeywords = $dashboard->dashboardsKeywords()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardsKeywordCollection($dashboardsKeywords));
    }

    /**
     * Search DashboardsSettings for Dashboard with given $id
     *
     * DashboardsSettings from existing resource.
     *
     * @param Request $request
     * @param Dashboard $dashboard
     * @return JsonResponse
     */
    public function searchDashboardsSettings(Request $request, Dashboard $dashboard): JsonResponse
    {
        $this->authorize('searchDashboardsSettings', $dashboard);

        $dashboardsSettings = $dashboard->dashboardsSettings()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardsSettingCollection($dashboardsSettings));
    }

    /**
     * Search SentEmailAlerts for Dashboard with given $id
     *
     * SentEmailAlerts from existing resource.
     *
     * @param Request $request
     * @param Dashboard $dashboard
     * @return JsonResponse
     */
    public function searchSentEmailAlerts(Request $request, Dashboard $dashboard): JsonResponse
    {
        $this->authorize('searchSentEmailAlerts', $dashboard);

        $sentEmailAlerts = $dashboard->sentEmailAlerts()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new SentEmailAlertCollection($sentEmailAlerts));
    }
}
