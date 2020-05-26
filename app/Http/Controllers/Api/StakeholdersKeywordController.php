<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\StakeholdersKeyword\StakeholdersKeywordResource;
use App\Http\Resources\StakeholdersKeyword\StakeholdersKeywordCollection;
use App\Http\Requests\StakeholdersKeyword\StoreStakeholdersKeywordRequest;
use App\Http\Requests\StakeholdersKeyword\UpdateStakeholdersKeywordRequest;
use App\Models\StakeholdersKeyword;

/**
 * @group StakeholdersKeyword
 *
 * Endpoints for StakeholdersKeyword entity
 */
class StakeholdersKeywordController extends Controller
{

    /**
     * Create a new StakeholdersKeywordController instance.
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
        $this->authorize('viewAny', StakeholdersKeyword::class);

        $stakeholders_keywords = StakeholdersKeyword::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersKeywordCollection($stakeholders_keywords));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreStakeholdersKeywordRequest  $request
     * @return JsonResponse
     */
    public function store(StoreStakeholdersKeywordRequest $request): JsonResponse
    {
        $this->authorize('create', StakeholdersKeyword::class);

        $stakeholders_keyword = $request->fill(new StakeholdersKeyword);

        $stakeholders_keyword->save();
        $stakeholders_keyword->loadIncludes();

        return response()->resource(new StakeholdersKeywordResource($stakeholders_keyword))
                ->message(__('crud.create', ['item' => __('model.StakeholdersKeyword')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateStakeholdersKeywordRequest  $request
     * @param  StakeholdersKeyword $stakeholders_keyword
     * @return JsonResponse
     */
    public function update(UpdateStakeholdersKeywordRequest $request, StakeholdersKeyword $stakeholders_keyword): JsonResponse
    {
        $this->authorize('update', $stakeholders_keyword);

        $request->fill($stakeholders_keyword);
        
        $stakeholders_keyword->update();
        $stakeholders_keyword->loadIncludes();

        return response()->resource(new StakeholdersKeywordResource($stakeholders_keyword))
                ->message(__('crud.update', ['item' => __('model.StakeholdersKeyword')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  StakeholdersKeyword $stakeholders_keyword
     * @return JsonResponse
     */
    public function show(StakeholdersKeyword $stakeholders_keyword): JsonResponse
    {
        $this->authorize('view', $stakeholders_keyword);

        $stakeholders_keyword->loadIncludes();

        return response()->resource(new StakeholdersKeywordResource($stakeholders_keyword));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  StakeholdersKeyword  $stakeholders_keyword
     * @return  JsonResponse
     */
    public function destroy(StakeholdersKeyword $stakeholders_keyword): JsonResponse
    {
        $this->authorize('delete', $stakeholders_keyword);

        $stakeholders_keyword->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.StakeholdersKeyword')]));
    }
}
