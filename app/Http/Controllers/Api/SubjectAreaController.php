<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\SubjectArea\SubjectAreaResource;
use App\Http\Resources\SubjectArea\SubjectAreaCollection;
use App\Http\Requests\SubjectArea\StoreSubjectAreaRequest;
use App\Http\Requests\SubjectArea\UpdateSubjectAreaRequest;
use App\Models\SubjectArea;

/**
 * @group SubjectArea
 *
 * Endpoints for SubjectArea entity
 */
class SubjectAreaController extends Controller
{

    /**
     * Create a new SubjectAreaController instance.
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
        $this->authorize('viewAny', SubjectArea::class);

        $subject_areas = SubjectArea::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new SubjectAreaCollection($subject_areas));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreSubjectAreaRequest  $request
     * @return JsonResponse
     */
    public function store(StoreSubjectAreaRequest $request): JsonResponse
    {
        $this->authorize('create', SubjectArea::class);

        $subject_area = $request->fill(new SubjectArea);

        $subject_area->save();
        $subject_area->loadIncludes();

        return response()->resource(new SubjectAreaResource($subject_area))
                ->message(__('crud.create', ['item' => __('model.SubjectArea')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateSubjectAreaRequest  $request
     * @param  SubjectArea $subject_area
     * @return JsonResponse
     */
    public function update(UpdateSubjectAreaRequest $request, SubjectArea $subject_area): JsonResponse
    {
        $this->authorize('update', $subject_area);

        $request->fill($subject_area);
        
        $subject_area->update();
        $subject_area->loadIncludes();

        return response()->resource(new SubjectAreaResource($subject_area))
                ->message(__('crud.update', ['item' => __('model.SubjectArea')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  SubjectArea $subject_area
     * @return JsonResponse
     */
    public function show(SubjectArea $subject_area): JsonResponse
    {
        $this->authorize('view', $subject_area);

        $subject_area->loadIncludes();

        return response()->resource(new SubjectAreaResource($subject_area));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  SubjectArea  $subject_area
     * @return  JsonResponse
     */
    public function destroy(SubjectArea $subject_area): JsonResponse
    {
        $this->authorize('delete', $subject_area);

        $subject_area->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.SubjectArea')]));
    }
}
