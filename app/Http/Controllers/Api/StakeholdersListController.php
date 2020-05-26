<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\StakeholdersList\StakeholdersListResource;
use App\Http\Resources\StakeholdersList\StakeholdersListCollection;
use App\Http\Requests\StakeholdersList\StoreStakeholdersListRequest;
use App\Http\Requests\StakeholdersList\UpdateStakeholdersListRequest;
use App\Models\StakeholdersList;

/**
 * @group StakeholdersList
 *
 * Endpoints for StakeholdersList entity
 */
class StakeholdersListController extends Controller
{

    /**
     * Create a new StakeholdersListController instance.
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
        $this->authorize('viewAny', StakeholdersList::class);

        $stakeholders_lists = StakeholdersList::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersListCollection($stakeholders_lists));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreStakeholdersListRequest  $request
     * @return JsonResponse
     */
    public function store(StoreStakeholdersListRequest $request): JsonResponse
    {
        $this->authorize('create', StakeholdersList::class);

        $stakeholders_list = $request->fill(new StakeholdersList);

        $stakeholders_list->save();
        $stakeholders_list->loadIncludes();

        return response()->resource(new StakeholdersListResource($stakeholders_list))
                ->message(__('crud.create', ['item' => __('model.StakeholdersList')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateStakeholdersListRequest  $request
     * @param  StakeholdersList $stakeholders_list
     * @return JsonResponse
     */
    public function update(UpdateStakeholdersListRequest $request, StakeholdersList $stakeholders_list): JsonResponse
    {
        $this->authorize('update', $stakeholders_list);

        $request->fill($stakeholders_list);
        
        $stakeholders_list->update();
        $stakeholders_list->loadIncludes();

        return response()->resource(new StakeholdersListResource($stakeholders_list))
                ->message(__('crud.update', ['item' => __('model.StakeholdersList')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  StakeholdersList $stakeholders_list
     * @return JsonResponse
     */
    public function show(StakeholdersList $stakeholders_list): JsonResponse
    {
        $this->authorize('view', $stakeholders_list);

        $stakeholders_list->loadIncludes();

        return response()->resource(new StakeholdersListResource($stakeholders_list));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  StakeholdersList  $stakeholders_list
     * @return  JsonResponse
     */
    public function destroy(StakeholdersList $stakeholders_list): JsonResponse
    {
        $this->authorize('delete', $stakeholders_list);

        $stakeholders_list->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.StakeholdersList')]));
    }
}
