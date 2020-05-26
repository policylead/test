<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\StakeholdersList\StakeholdersListCollection;
use App\Http\Resources\StakeholdersDatum\StakeholdersDatumResource;
use App\Http\Resources\StakeholdersDatum\StakeholdersDatumCollection;
use App\Http\Requests\StakeholdersDatum\StoreStakeholdersDatumRequest;
use App\Http\Requests\StakeholdersDatum\UpdateStakeholdersDatumRequest;
use App\Models\StakeholdersDatum;
use App\Models\StakeholdersList;

/**
 * @group StakeholdersDatum
 *
 * Endpoints for StakeholdersDatum entity
 */
class StakeholdersDatumController extends Controller
{

    /**
     * Create a new StakeholdersDatumController instance.
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
        $this->authorize('viewAny', StakeholdersDatum::class);

        $stakeholders_data = StakeholdersDatum::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersDatumCollection($stakeholders_data));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreStakeholdersDatumRequest  $request
     * @return JsonResponse
     */
    public function store(StoreStakeholdersDatumRequest $request): JsonResponse
    {
        $this->authorize('create', StakeholdersDatum::class);

        $stakeholders_datum = $request->fill(new StakeholdersDatum);
        if ($backup_picture = $request->file('backup_picture')) {
            $stakeholders_datum->backup_picture = $backup_picture->store(config('storage.stakeholders_datas.backup_picture'));
        }

        $stakeholders_datum->save();
        $stakeholders_datum->loadIncludes();

        return response()->resource(new StakeholdersDatumResource($stakeholders_datum))
                ->message(__('crud.create', ['item' => __('model.StakeholdersDatum')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateStakeholdersDatumRequest  $request
     * @param  StakeholdersDatum $stakeholders_datum
     * @return JsonResponse
     */
    public function update(UpdateStakeholdersDatumRequest $request, StakeholdersDatum $stakeholders_datum): JsonResponse
    {
        $this->authorize('update', $stakeholders_datum);

        $request->fill($stakeholders_datum);
        if ($backup_picture = $request->file('backup_picture')) {
            \Storage::delete($stakeholders_datum->getOriginal('backup_picture'));
            $stakeholders_datum->backup_picture = $backup_picture->store(config('storage.stakeholders_datas.backup_picture'));
        }

        $stakeholders_datum->update();
        $stakeholders_datum->loadIncludes();

        return response()->resource(new StakeholdersDatumResource($stakeholders_datum))
                ->message(__('crud.update', ['item' => __('model.StakeholdersDatum')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  StakeholdersDatum $stakeholders_datum
     * @return JsonResponse
     */
    public function show(StakeholdersDatum $stakeholders_datum): JsonResponse
    {
        $this->authorize('view', $stakeholders_datum);

        $stakeholders_datum->loadIncludes();

        return response()->resource(new StakeholdersDatumResource($stakeholders_datum));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  StakeholdersDatum  $stakeholders_datum
     * @return  JsonResponse
     */
    public function destroy(StakeholdersDatum $stakeholders_datum): JsonResponse
    {
        $this->authorize('delete', $stakeholders_datum);

        $stakeholders_datum->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.StakeholdersDatum')]));
    }

    /**
     * Search StakeholdersLists for StakeholdersDatum with given $id
     *
     * StakeholdersLists from existing resource.
     *
     * @param Request $request
     * @param StakeholdersDatum $stakeholders_datum
     * @return JsonResponse
     */
    public function searchStakeholdersLists(Request $request, StakeholdersDatum $stakeholders_datum): JsonResponse
    {
        $this->authorize('searchStakeholdersLists', $stakeholders_datum);

        $stakeholdersLists = $stakeholders_datum->stakeholdersLists()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersListCollection($stakeholdersLists));
    }
}
