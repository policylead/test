<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\Interest\InterestResource;
use App\Http\Resources\Interest\InterestCollection;
use App\Http\Requests\Interest\StoreInterestRequest;
use App\Http\Requests\Interest\UpdateInterestRequest;
use App\Models\Interest;

/**
 * @group Interest
 *
 * Endpoints for Interest entity
 */
class InterestController extends Controller
{

    /**
     * Create a new InterestController instance.
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
        $this->authorize('viewAny', Interest::class);

        $interests = Interest::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new InterestCollection($interests));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreInterestRequest  $request
     * @return JsonResponse
     */
    public function store(StoreInterestRequest $request): JsonResponse
    {
        $this->authorize('create', Interest::class);

        $interest = $request->fill(new Interest);

        $interest->save();
        $interest->loadIncludes();

        return response()->resource(new InterestResource($interest))
                ->message(__('crud.create', ['item' => __('model.Interest')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateInterestRequest  $request
     * @param  Interest $interest
     * @return JsonResponse
     */
    public function update(UpdateInterestRequest $request, Interest $interest): JsonResponse
    {
        $this->authorize('update', $interest);

        $request->fill($interest);
        
        $interest->update();
        $interest->loadIncludes();

        return response()->resource(new InterestResource($interest))
                ->message(__('crud.update', ['item' => __('model.Interest')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Interest $interest
     * @return JsonResponse
     */
    public function show(Interest $interest): JsonResponse
    {
        $this->authorize('view', $interest);

        $interest->loadIncludes();

        return response()->resource(new InterestResource($interest));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Interest  $interest
     * @return  JsonResponse
     */
    public function destroy(Interest $interest): JsonResponse
    {
        $this->authorize('delete', $interest);

        $interest->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Interest')]));
    }

    /**
     * Search Users for Interest with given $id
     *
     * Users from existing resource.
     *
     * @param Request $request
     * @param Interest $interest
     * @return JsonResponse
     */
    public function searchUsers(Request $request, Interest $interest): JsonResponse
    {
        $this->authorize('searchUsers', $interest);

        $users = $interest->users()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UserCollection($users));
    }
}
