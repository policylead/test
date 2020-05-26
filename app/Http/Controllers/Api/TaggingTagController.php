<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\TaggingTag\TaggingTagResource;
use App\Http\Resources\TaggingTag\TaggingTagCollection;
use App\Http\Requests\TaggingTag\StoreTaggingTagRequest;
use App\Http\Requests\TaggingTag\UpdateTaggingTagRequest;
use App\Models\TaggingTag;

/**
 * @group TaggingTag
 *
 * Endpoints for TaggingTag entity
 */
class TaggingTagController extends Controller
{

    /**
     * Create a new TaggingTagController instance.
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
        $this->authorize('viewAny', TaggingTag::class);

        $tagging_tags = TaggingTag::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new TaggingTagCollection($tagging_tags));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreTaggingTagRequest  $request
     * @return JsonResponse
     */
    public function store(StoreTaggingTagRequest $request): JsonResponse
    {
        $this->authorize('create', TaggingTag::class);

        $tagging_tag = $request->fill(new TaggingTag);

        $tagging_tag->save();
        $tagging_tag->loadIncludes();

        return response()->resource(new TaggingTagResource($tagging_tag))
                ->message(__('crud.create', ['item' => __('model.TaggingTag')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateTaggingTagRequest  $request
     * @param  TaggingTag $tagging_tag
     * @return JsonResponse
     */
    public function update(UpdateTaggingTagRequest $request, TaggingTag $tagging_tag): JsonResponse
    {
        $this->authorize('update', $tagging_tag);

        $request->fill($tagging_tag);
        
        $tagging_tag->update();
        $tagging_tag->loadIncludes();

        return response()->resource(new TaggingTagResource($tagging_tag))
                ->message(__('crud.update', ['item' => __('model.TaggingTag')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  TaggingTag $tagging_tag
     * @return JsonResponse
     */
    public function show(TaggingTag $tagging_tag): JsonResponse
    {
        $this->authorize('view', $tagging_tag);

        $tagging_tag->loadIncludes();

        return response()->resource(new TaggingTagResource($tagging_tag));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  TaggingTag  $tagging_tag
     * @return  JsonResponse
     */
    public function destroy(TaggingTag $tagging_tag): JsonResponse
    {
        $this->authorize('delete', $tagging_tag);

        $tagging_tag->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.TaggingTag')]));
    }
}
