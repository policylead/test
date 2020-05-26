<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\UserLimit\UserLimitResource;
use App\Http\Resources\UserLimit\UserLimitCollection;
use App\Http\Requests\UserLimit\StoreUserLimitRequest;
use App\Http\Requests\UserLimit\UpdateUserLimitRequest;
use App\Models\UserLimit;

/**
 * @group UserLimit
 *
 * Endpoints for UserLimit entity
 */
class UserLimitController extends Controller
{

    /**
     * Create a new UserLimitController instance.
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
        $this->authorize('viewAny', UserLimit::class);

        $user_limits = UserLimit::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UserLimitCollection($user_limits));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreUserLimitRequest  $request
     * @return JsonResponse
     */
    public function store(StoreUserLimitRequest $request): JsonResponse
    {
        $this->authorize('create', UserLimit::class);

        $user_limit = $request->fill(new UserLimit);

        $user_limit->user_id = auth()->user()->id;

        $user_limit->save();
        $user_limit->loadIncludes();

        return response()->resource(new UserLimitResource($user_limit))
                ->message(__('crud.create', ['item' => __('model.UserLimit')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateUserLimitRequest  $request
     * @param  UserLimit $user_limit
     * @return JsonResponse
     */
    public function update(UpdateUserLimitRequest $request, UserLimit $user_limit): JsonResponse
    {
        $this->authorize('update', $user_limit);

        $request->fill($user_limit);
        
        $user_limit->update();
        $user_limit->loadIncludes();

        return response()->resource(new UserLimitResource($user_limit))
                ->message(__('crud.update', ['item' => __('model.UserLimit')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  UserLimit $user_limit
     * @return JsonResponse
     */
    public function show(UserLimit $user_limit): JsonResponse
    {
        $this->authorize('view', $user_limit);

        $user_limit->loadIncludes();

        return response()->resource(new UserLimitResource($user_limit));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  UserLimit  $user_limit
     * @return  JsonResponse
     */
    public function destroy(UserLimit $user_limit): JsonResponse
    {
        $this->authorize('delete', $user_limit);

        $user_limit->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.UserLimit')]));
    }
}
