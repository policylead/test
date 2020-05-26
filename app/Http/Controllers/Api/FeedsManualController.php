<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\FeedsManual\FeedsManualResource;
use App\Http\Resources\FeedsManual\FeedsManualCollection;
use App\Http\Requests\FeedsManual\StoreFeedsManualRequest;
use App\Http\Requests\FeedsManual\UpdateFeedsManualRequest;
use App\Models\FeedsManual;

/**
 * @group FeedsManual
 *
 * Endpoints for FeedsManual entity
 */
class FeedsManualController extends Controller
{

    /**
     * Create a new FeedsManualController instance.
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
        $this->authorize('viewAny', FeedsManual::class);

        $feeds_manuals = FeedsManual::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new FeedsManualCollection($feeds_manuals));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreFeedsManualRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFeedsManualRequest $request): JsonResponse
    {
        $this->authorize('create', FeedsManual::class);

        $feeds_manual = $request->fill(new FeedsManual);

        $feeds_manual->save();
        $feeds_manual->loadIncludes();

        return response()->resource(new FeedsManualResource($feeds_manual))
                ->message(__('crud.create', ['item' => __('model.FeedsManual')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateFeedsManualRequest  $request
     * @param  FeedsManual $feeds_manual
     * @return JsonResponse
     */
    public function update(UpdateFeedsManualRequest $request, FeedsManual $feeds_manual): JsonResponse
    {
        $this->authorize('update', $feeds_manual);

        $request->fill($feeds_manual);
        
        $feeds_manual->update();
        $feeds_manual->loadIncludes();

        return response()->resource(new FeedsManualResource($feeds_manual))
                ->message(__('crud.update', ['item' => __('model.FeedsManual')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  FeedsManual $feeds_manual
     * @return JsonResponse
     */
    public function show(FeedsManual $feeds_manual): JsonResponse
    {
        $this->authorize('view', $feeds_manual);

        $feeds_manual->loadIncludes();

        return response()->resource(new FeedsManualResource($feeds_manual));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  FeedsManual  $feeds_manual
     * @return  JsonResponse
     */
    public function destroy(FeedsManual $feeds_manual): JsonResponse
    {
        $this->authorize('delete', $feeds_manual);

        $feeds_manual->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.FeedsManual')]));
    }
}
