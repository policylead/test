<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportsEmailClick\ReportsEmailClickResource;
use App\Http\Resources\ReportsEmailClick\ReportsEmailClickCollection;
use App\Http\Requests\ReportsEmailClick\StoreReportsEmailClickRequest;
use App\Http\Requests\ReportsEmailClick\UpdateReportsEmailClickRequest;
use App\Models\ReportsEmailClick;

/**
 * @group ReportsEmailClick
 *
 * Endpoints for ReportsEmailClick entity
 */
class ReportsEmailClickController extends Controller
{

    /**
     * Create a new ReportsEmailClickController instance.
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
        $this->authorize('viewAny', ReportsEmailClick::class);

        $reports_email_clicks = ReportsEmailClick::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsEmailClickCollection($reports_email_clicks));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsEmailClickRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsEmailClickRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsEmailClick::class);

        $reports_email_click = $request->fill(new ReportsEmailClick);

        $reports_email_click->save();
        $reports_email_click->loadIncludes();

        return response()->resource(new ReportsEmailClickResource($reports_email_click))
                ->message(__('crud.create', ['item' => __('model.ReportsEmailClick')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsEmailClickRequest  $request
     * @param  ReportsEmailClick $reports_email_click
     * @return JsonResponse
     */
    public function update(UpdateReportsEmailClickRequest $request, ReportsEmailClick $reports_email_click): JsonResponse
    {
        $this->authorize('update', $reports_email_click);

        $request->fill($reports_email_click);
        
        $reports_email_click->update();
        $reports_email_click->loadIncludes();

        return response()->resource(new ReportsEmailClickResource($reports_email_click))
                ->message(__('crud.update', ['item' => __('model.ReportsEmailClick')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsEmailClick $reports_email_click
     * @return JsonResponse
     */
    public function show(ReportsEmailClick $reports_email_click): JsonResponse
    {
        $this->authorize('view', $reports_email_click);

        $reports_email_click->loadIncludes();

        return response()->resource(new ReportsEmailClickResource($reports_email_click));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsEmailClick  $reports_email_click
     * @return  JsonResponse
     */
    public function destroy(ReportsEmailClick $reports_email_click): JsonResponse
    {
        $this->authorize('delete', $reports_email_click);

        $reports_email_click->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsEmailClick')]));
    }
}
