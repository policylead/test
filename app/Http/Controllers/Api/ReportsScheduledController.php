<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportsScheduled\ReportsScheduledResource;
use App\Http\Resources\ReportsScheduled\ReportsScheduledCollection;
use App\Http\Requests\ReportsScheduled\StoreReportsScheduledRequest;
use App\Http\Requests\ReportsScheduled\UpdateReportsScheduledRequest;
use App\Models\ReportsScheduled;

/**
 * @group ReportsScheduled
 *
 * Endpoints for ReportsScheduled entity
 */
class ReportsScheduledController extends Controller
{

    /**
     * Create a new ReportsScheduledController instance.
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
        $this->authorize('viewAny', ReportsScheduled::class);

        $reports_scheduleds = ReportsScheduled::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsScheduledCollection($reports_scheduleds));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsScheduledRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsScheduledRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsScheduled::class);

        $reports_scheduled = $request->fill(new ReportsScheduled);

        $reports_scheduled->save();
        $reports_scheduled->loadIncludes();

        return response()->resource(new ReportsScheduledResource($reports_scheduled))
                ->message(__('crud.create', ['item' => __('model.ReportsScheduled')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsScheduledRequest  $request
     * @param  ReportsScheduled $reports_scheduled
     * @return JsonResponse
     */
    public function update(UpdateReportsScheduledRequest $request, ReportsScheduled $reports_scheduled): JsonResponse
    {
        $this->authorize('update', $reports_scheduled);

        $request->fill($reports_scheduled);
        
        $reports_scheduled->update();
        $reports_scheduled->loadIncludes();

        return response()->resource(new ReportsScheduledResource($reports_scheduled))
                ->message(__('crud.update', ['item' => __('model.ReportsScheduled')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsScheduled $reports_scheduled
     * @return JsonResponse
     */
    public function show(ReportsScheduled $reports_scheduled): JsonResponse
    {
        $this->authorize('view', $reports_scheduled);

        $reports_scheduled->loadIncludes();

        return response()->resource(new ReportsScheduledResource($reports_scheduled));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsScheduled  $reports_scheduled
     * @return  JsonResponse
     */
    public function destroy(ReportsScheduled $reports_scheduled): JsonResponse
    {
        $this->authorize('delete', $reports_scheduled);

        $reports_scheduled->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsScheduled')]));
    }
}
