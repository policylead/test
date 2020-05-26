<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\DashboardsSetting\DashboardsSettingResource;
use App\Http\Resources\DashboardsSetting\DashboardsSettingCollection;
use App\Http\Requests\DashboardsSetting\StoreDashboardsSettingRequest;
use App\Http\Requests\DashboardsSetting\UpdateDashboardsSettingRequest;
use App\Models\DashboardsSetting;

/**
 * @group DashboardsSetting
 *
 * Endpoints for DashboardsSetting entity
 */
class DashboardsSettingController extends Controller
{

    /**
     * Create a new DashboardsSettingController instance.
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
        $this->authorize('viewAny', DashboardsSetting::class);

        $dashboards_settings = DashboardsSetting::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardsSettingCollection($dashboards_settings));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDashboardsSettingRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDashboardsSettingRequest $request): JsonResponse
    {
        $this->authorize('create', DashboardsSetting::class);

        $dashboards_setting = $request->fill(new DashboardsSetting);

        $dashboards_setting->user_id = auth()->user()->id;

        $dashboards_setting->save();
        $dashboards_setting->loadIncludes();

        return response()->resource(new DashboardsSettingResource($dashboards_setting))
                ->message(__('crud.create', ['item' => __('model.DashboardsSetting')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDashboardsSettingRequest  $request
     * @param  DashboardsSetting $dashboards_setting
     * @return JsonResponse
     */
    public function update(UpdateDashboardsSettingRequest $request, DashboardsSetting $dashboards_setting): JsonResponse
    {
        $this->authorize('update', $dashboards_setting);

        $request->fill($dashboards_setting);
        
        $dashboards_setting->update();
        $dashboards_setting->loadIncludes();

        return response()->resource(new DashboardsSettingResource($dashboards_setting))
                ->message(__('crud.update', ['item' => __('model.DashboardsSetting')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  DashboardsSetting $dashboards_setting
     * @return JsonResponse
     */
    public function show(DashboardsSetting $dashboards_setting): JsonResponse
    {
        $this->authorize('view', $dashboards_setting);

        $dashboards_setting->loadIncludes();

        return response()->resource(new DashboardsSettingResource($dashboards_setting));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  DashboardsSetting  $dashboards_setting
     * @return  JsonResponse
     */
    public function destroy(DashboardsSetting $dashboards_setting): JsonResponse
    {
        $this->authorize('delete', $dashboards_setting);

        $dashboards_setting->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.DashboardsSetting')]));
    }
}
