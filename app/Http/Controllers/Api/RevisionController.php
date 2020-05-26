<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Revision\RevisionResource;
use App\Http\Resources\Revision\RevisionCollection;
use App\Http\Requests\Revision\StoreRevisionRequest;
use App\Http\Requests\Revision\UpdateRevisionRequest;
use App\Models\Revision;

/**
 * @group Revision
 *
 * Endpoints for Revision entity
 */
class RevisionController extends Controller
{

    /**
     * Create a new RevisionController instance.
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
        $this->authorize('viewAny', Revision::class);

        $revisions = Revision::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new RevisionCollection($revisions));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreRevisionRequest  $request
     * @return JsonResponse
     */
    public function store(StoreRevisionRequest $request): JsonResponse
    {
        $this->authorize('create', Revision::class);

        $revision = $request->fill(new Revision);

        $revision->user_id = auth()->user()->id;

        $revision->save();
        $revision->loadIncludes();

        return response()->resource(new RevisionResource($revision))
                ->message(__('crud.create', ['item' => __('model.Revision')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateRevisionRequest  $request
     * @param  Revision $revision
     * @return JsonResponse
     */
    public function update(UpdateRevisionRequest $request, Revision $revision): JsonResponse
    {
        $this->authorize('update', $revision);

        $request->fill($revision);
        
        $revision->update();
        $revision->loadIncludes();

        return response()->resource(new RevisionResource($revision))
                ->message(__('crud.update', ['item' => __('model.Revision')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Revision $revision
     * @return JsonResponse
     */
    public function show(Revision $revision): JsonResponse
    {
        $this->authorize('view', $revision);

        $revision->loadIncludes();

        return response()->resource(new RevisionResource($revision));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Revision  $revision
     * @return  JsonResponse
     */
    public function destroy(Revision $revision): JsonResponse
    {
        $this->authorize('delete', $revision);

        $revision->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Revision')]));
    }
}
