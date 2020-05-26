<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Bookmark\BookmarkResource;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Requests\Bookmark\StoreBookmarkRequest;
use App\Http\Requests\Bookmark\UpdateBookmarkRequest;
use App\Models\Bookmark;

/**
 * @group Bookmark
 *
 * Endpoints for Bookmark entity
 */
class BookmarkController extends Controller
{

    /**
     * Create a new BookmarkController instance.
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
        $this->authorize('viewAny', Bookmark::class);

        $bookmarks = Bookmark::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BookmarkCollection($bookmarks));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreBookmarkRequest  $request
     * @return JsonResponse
     */
    public function store(StoreBookmarkRequest $request): JsonResponse
    {
        $this->authorize('create', Bookmark::class);

        $bookmark = $request->fill(new Bookmark);

        $bookmark->user_id = auth()->user()->id;

        $bookmark->save();
        $bookmark->loadIncludes();

        return response()->resource(new BookmarkResource($bookmark))
                ->message(__('crud.create', ['item' => __('model.Bookmark')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateBookmarkRequest  $request
     * @param  Bookmark $bookmark
     * @return JsonResponse
     */
    public function update(UpdateBookmarkRequest $request, Bookmark $bookmark): JsonResponse
    {
        $this->authorize('update', $bookmark);

        $request->fill($bookmark);
        
        $bookmark->update();
        $bookmark->loadIncludes();

        return response()->resource(new BookmarkResource($bookmark))
                ->message(__('crud.update', ['item' => __('model.Bookmark')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Bookmark $bookmark
     * @return JsonResponse
     */
    public function show(Bookmark $bookmark): JsonResponse
    {
        $this->authorize('view', $bookmark);

        $bookmark->loadIncludes();

        return response()->resource(new BookmarkResource($bookmark));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Bookmark  $bookmark
     * @return  JsonResponse
     */
    public function destroy(Bookmark $bookmark): JsonResponse
    {
        $this->authorize('delete', $bookmark);

        $bookmark->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Bookmark')]));
    }
}
