<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\FeedsDuplicate\FeedsDuplicateResource;
use App\Http\Resources\FeedsDuplicate\FeedsDuplicateCollection;
use App\Http\Requests\FeedsDuplicate\StoreFeedsDuplicateRequest;
use App\Http\Requests\FeedsDuplicate\UpdateFeedsDuplicateRequest;
use App\Models\FeedsDuplicate;

/**
 * @group FeedsDuplicate
 *
 * Endpoints for FeedsDuplicate entity
 */
class FeedsDuplicateController extends Controller
{

    /**
     * Create a new FeedsDuplicateController instance.
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
        $this->authorize('viewAny', FeedsDuplicate::class);

        $feeds_duplicates = FeedsDuplicate::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new FeedsDuplicateCollection($feeds_duplicates));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreFeedsDuplicateRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFeedsDuplicateRequest $request): JsonResponse
    {
        $this->authorize('create', FeedsDuplicate::class);

        $feeds_duplicate = $request->fill(new FeedsDuplicate);

        $feeds_duplicate->save();
        $feeds_duplicate->loadIncludes();

        return response()->resource(new FeedsDuplicateResource($feeds_duplicate))
                ->message(__('crud.create', ['item' => __('model.FeedsDuplicate')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateFeedsDuplicateRequest  $request
     * @param  FeedsDuplicate $feeds_duplicate
     * @return JsonResponse
     */
    public function update(UpdateFeedsDuplicateRequest $request, FeedsDuplicate $feeds_duplicate): JsonResponse
    {
        $this->authorize('update', $feeds_duplicate);

        $request->fill($feeds_duplicate);
        
        $feeds_duplicate->update();
        $feeds_duplicate->loadIncludes();

        return response()->resource(new FeedsDuplicateResource($feeds_duplicate))
                ->message(__('crud.update', ['item' => __('model.FeedsDuplicate')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  FeedsDuplicate $feeds_duplicate
     * @return JsonResponse
     */
    public function show(FeedsDuplicate $feeds_duplicate): JsonResponse
    {
        $this->authorize('view', $feeds_duplicate);

        $feeds_duplicate->loadIncludes();

        return response()->resource(new FeedsDuplicateResource($feeds_duplicate));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  FeedsDuplicate  $feeds_duplicate
     * @return  JsonResponse
     */
    public function destroy(FeedsDuplicate $feeds_duplicate): JsonResponse
    {
        $this->authorize('delete', $feeds_duplicate);

        $feeds_duplicate->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.FeedsDuplicate')]));
    }
}
