<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\University\UniversityResource;
use App\Http\Resources\University\UniversityCollection;
use App\Http\Requests\University\StoreUniversityRequest;
use App\Http\Requests\University\UpdateUniversityRequest;
use App\Models\University;

/**
 * @group University
 *
 * Endpoints for University entity
 */
class UniversityController extends Controller
{

    /**
     * Create a new UniversityController instance.
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
        $this->authorize('viewAny', University::class);

        $universities = University::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UniversityCollection($universities));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreUniversityRequest  $request
     * @return JsonResponse
     */
    public function store(StoreUniversityRequest $request): JsonResponse
    {
        $this->authorize('create', University::class);

        $university = $request->fill(new University);

        $university->save();
        $university->loadIncludes();

        return response()->resource(new UniversityResource($university))
                ->message(__('crud.create', ['item' => __('model.University')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateUniversityRequest  $request
     * @param  University $university
     * @return JsonResponse
     */
    public function update(UpdateUniversityRequest $request, University $university): JsonResponse
    {
        $this->authorize('update', $university);

        $request->fill($university);
        
        $university->update();
        $university->loadIncludes();

        return response()->resource(new UniversityResource($university))
                ->message(__('crud.update', ['item' => __('model.University')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  University $university
     * @return JsonResponse
     */
    public function show(University $university): JsonResponse
    {
        $this->authorize('view', $university);

        $university->loadIncludes();

        return response()->resource(new UniversityResource($university));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  University  $university
     * @return  JsonResponse
     */
    public function destroy(University $university): JsonResponse
    {
        $this->authorize('delete', $university);

        $university->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.University')]));
    }
}
