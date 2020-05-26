<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportsVersion\ReportsVersionResource;
use App\Http\Resources\ReportsVersion\ReportsVersionCollection;
use App\Http\Requests\ReportsVersion\StoreReportsVersionRequest;
use App\Http\Requests\ReportsVersion\UpdateReportsVersionRequest;
use App\Models\ReportsVersion;

/**
 * @group ReportsVersion
 *
 * Endpoints for ReportsVersion entity
 */
class ReportsVersionController extends Controller
{

    /**
     * Create a new ReportsVersionController instance.
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
        $this->authorize('viewAny', ReportsVersion::class);

        $reports_versions = ReportsVersion::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsVersionCollection($reports_versions));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsVersionRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsVersionRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsVersion::class);

        $reports_version = $request->fill(new ReportsVersion);

        $reports_version->save();
        $reports_version->loadIncludes();

        return response()->resource(new ReportsVersionResource($reports_version))
                ->message(__('crud.create', ['item' => __('model.ReportsVersion')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsVersionRequest  $request
     * @param  ReportsVersion $reports_version
     * @return JsonResponse
     */
    public function update(UpdateReportsVersionRequest $request, ReportsVersion $reports_version): JsonResponse
    {
        $this->authorize('update', $reports_version);

        $request->fill($reports_version);
        
        $reports_version->update();
        $reports_version->loadIncludes();

        return response()->resource(new ReportsVersionResource($reports_version))
                ->message(__('crud.update', ['item' => __('model.ReportsVersion')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsVersion $reports_version
     * @return JsonResponse
     */
    public function show(ReportsVersion $reports_version): JsonResponse
    {
        $this->authorize('view', $reports_version);

        $reports_version->loadIncludes();

        return response()->resource(new ReportsVersionResource($reports_version));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsVersion  $reports_version
     * @return  JsonResponse
     */
    public function destroy(ReportsVersion $reports_version): JsonResponse
    {
        $this->authorize('delete', $reports_version);

        $reports_version->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsVersion')]));
    }
}
