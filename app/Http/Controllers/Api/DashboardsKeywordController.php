<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\DashboardsKeyword\DashboardsKeywordResource;
use App\Http\Resources\DashboardsKeyword\DashboardsKeywordCollection;
use App\Http\Requests\DashboardsKeyword\StoreDashboardsKeywordRequest;
use App\Http\Requests\DashboardsKeyword\UpdateDashboardsKeywordRequest;
use App\Models\DashboardsKeyword;

/**
 * @group DashboardsKeyword
 *
 * Endpoints for DashboardsKeyword entity
 */
class DashboardsKeywordController extends Controller
{

    /**
     * Create a new DashboardsKeywordController instance.
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
        $this->authorize('viewAny', DashboardsKeyword::class);

        $dashboards_keywords = DashboardsKeyword::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardsKeywordCollection($dashboards_keywords));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDashboardsKeywordRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDashboardsKeywordRequest $request): JsonResponse
    {
        $this->authorize('create', DashboardsKeyword::class);

        $dashboards_keyword = $request->fill(new DashboardsKeyword);

        $dashboards_keyword->save();
        $dashboards_keyword->loadIncludes();

        return response()->resource(new DashboardsKeywordResource($dashboards_keyword))
                ->message(__('crud.create', ['item' => __('model.DashboardsKeyword')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDashboardsKeywordRequest  $request
     * @param  DashboardsKeyword $dashboards_keyword
     * @return JsonResponse
     */
    public function update(UpdateDashboardsKeywordRequest $request, DashboardsKeyword $dashboards_keyword): JsonResponse
    {
        $this->authorize('update', $dashboards_keyword);

        $request->fill($dashboards_keyword);
        
        $dashboards_keyword->update();
        $dashboards_keyword->loadIncludes();

        return response()->resource(new DashboardsKeywordResource($dashboards_keyword))
                ->message(__('crud.update', ['item' => __('model.DashboardsKeyword')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  DashboardsKeyword $dashboards_keyword
     * @return JsonResponse
     */
    public function show(DashboardsKeyword $dashboards_keyword): JsonResponse
    {
        $this->authorize('view', $dashboards_keyword);

        $dashboards_keyword->loadIncludes();

        return response()->resource(new DashboardsKeywordResource($dashboards_keyword));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  DashboardsKeyword  $dashboards_keyword
     * @return  JsonResponse
     */
    public function destroy(DashboardsKeyword $dashboards_keyword): JsonResponse
    {
        $this->authorize('delete', $dashboards_keyword);

        $dashboards_keyword->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.DashboardsKeyword')]));
    }
}
