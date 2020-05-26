<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\TaggingTagged\TaggingTaggedResource;
use App\Http\Resources\TaggingTagged\TaggingTaggedCollection;
use App\Http\Requests\TaggingTagged\StoreTaggingTaggedRequest;
use App\Http\Requests\TaggingTagged\UpdateTaggingTaggedRequest;
use App\Models\TaggingTagged;

/**
 * @group TaggingTagged
 *
 * Endpoints for TaggingTagged entity
 */
class TaggingTaggedController extends Controller
{

    /**
     * Create a new TaggingTaggedController instance.
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
        $this->authorize('viewAny', TaggingTagged::class);

        $tagging_taggeds = TaggingTagged::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new TaggingTaggedCollection($tagging_taggeds));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreTaggingTaggedRequest  $request
     * @return JsonResponse
     */
    public function store(StoreTaggingTaggedRequest $request): JsonResponse
    {
        $this->authorize('create', TaggingTagged::class);

        $tagging_tagged = $request->fill(new TaggingTagged);

        $tagging_tagged->save();
        $tagging_tagged->loadIncludes();

        return response()->resource(new TaggingTaggedResource($tagging_tagged))
                ->message(__('crud.create', ['item' => __('model.TaggingTagged')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateTaggingTaggedRequest  $request
     * @param  TaggingTagged $tagging_tagged
     * @return JsonResponse
     */
    public function update(UpdateTaggingTaggedRequest $request, TaggingTagged $tagging_tagged): JsonResponse
    {
        $this->authorize('update', $tagging_tagged);

        $request->fill($tagging_tagged);
        
        $tagging_tagged->update();
        $tagging_tagged->loadIncludes();

        return response()->resource(new TaggingTaggedResource($tagging_tagged))
                ->message(__('crud.update', ['item' => __('model.TaggingTagged')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  TaggingTagged $tagging_tagged
     * @return JsonResponse
     */
    public function show(TaggingTagged $tagging_tagged): JsonResponse
    {
        $this->authorize('view', $tagging_tagged);

        $tagging_tagged->loadIncludes();

        return response()->resource(new TaggingTaggedResource($tagging_tagged));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  TaggingTagged  $tagging_tagged
     * @return  JsonResponse
     */
    public function destroy(TaggingTagged $tagging_tagged): JsonResponse
    {
        $this->authorize('delete', $tagging_tagged);

        $tagging_tagged->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.TaggingTagged')]));
    }
}
