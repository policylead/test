<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\StakeholdersKeyword\StakeholdersKeywordCollection;
use App\Http\Resources\StakeholdersList\StakeholdersListCollection;
use App\Http\Resources\Stakeholder\StakeholderResource;
use App\Http\Resources\Stakeholder\StakeholderCollection;
use App\Http\Requests\Stakeholder\StoreStakeholderRequest;
use App\Http\Requests\Stakeholder\UpdateStakeholderRequest;
use App\Models\Stakeholder;
use App\Models\StakeholdersKeyword;
use App\Models\StakeholdersList;

/**
 * @group Stakeholder
 *
 * Endpoints for Stakeholder entity
 */
class StakeholderController extends Controller
{

    /**
     * Create a new StakeholderController instance.
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
        $this->authorize('viewAny', Stakeholder::class);

        $stakeholders = Stakeholder::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholderCollection($stakeholders));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreStakeholderRequest  $request
     * @return JsonResponse
     */
    public function store(StoreStakeholderRequest $request): JsonResponse
    {
        $this->authorize('create', Stakeholder::class);

        $stakeholder = $request->fill(new Stakeholder);

        $stakeholder->user_id = auth()->user()->id;

        $stakeholder->save();
        $stakeholder->loadIncludes();

        return response()->resource(new StakeholderResource($stakeholder))
                ->message(__('crud.create', ['item' => __('model.Stakeholder')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateStakeholderRequest  $request
     * @param  Stakeholder $stakeholder
     * @return JsonResponse
     */
    public function update(UpdateStakeholderRequest $request, Stakeholder $stakeholder): JsonResponse
    {
        $this->authorize('update', $stakeholder);

        $request->fill($stakeholder);
        
        $stakeholder->update();
        $stakeholder->loadIncludes();

        return response()->resource(new StakeholderResource($stakeholder))
                ->message(__('crud.update', ['item' => __('model.Stakeholder')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Stakeholder $stakeholder
     * @return JsonResponse
     */
    public function show(Stakeholder $stakeholder): JsonResponse
    {
        $this->authorize('view', $stakeholder);

        $stakeholder->loadIncludes();

        return response()->resource(new StakeholderResource($stakeholder));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Stakeholder  $stakeholder
     * @return  JsonResponse
     */
    public function destroy(Stakeholder $stakeholder): JsonResponse
    {
        $this->authorize('delete', $stakeholder);

        $stakeholder->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Stakeholder')]));
    }

    /**
     * Search Keywords for Stakeholder with given $id
     *
     * Keywords from existing resource.
     *
     * @param Request $request
     * @param Stakeholder $stakeholder
     * @return JsonResponse
     */
    public function searchKeywords(Request $request, Stakeholder $stakeholder): JsonResponse
    {
        $this->authorize('searchKeywords', $stakeholder);

        $keywords = $stakeholder->keywords()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersKeywordCollection($keywords));
    }

    /**
     * Search StakeholdersList for Stakeholder with given $id
     *
     * StakeholdersList from existing resource.
     *
     * @param Request $request
     * @param Stakeholder $stakeholder
     * @return JsonResponse
     */
    public function searchStakeholdersList(Request $request, Stakeholder $stakeholder): JsonResponse
    {
        $this->authorize('searchStakeholdersList', $stakeholder);

        $stakeholdersList = $stakeholder->stakeholdersList()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersListCollection($stakeholdersList));
    }
}
