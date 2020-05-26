<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\UserDocRequest\UserDocRequestResource;
use App\Http\Resources\UserDocRequest\UserDocRequestCollection;
use App\Http\Requests\UserDocRequest\StoreUserDocRequestRequest;
use App\Http\Requests\UserDocRequest\UpdateUserDocRequestRequest;
use App\Models\UserDocRequest;

/**
 * @group UserDocRequest
 *
 * Endpoints for UserDocRequest entity
 */
class UserDocRequestController extends Controller
{

    /**
     * Create a new UserDocRequestController instance.
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
        $this->authorize('viewAny', UserDocRequest::class);

        $user_doc_requests = UserDocRequest::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UserDocRequestCollection($user_doc_requests));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreUserDocRequestRequest  $request
     * @return JsonResponse
     */
    public function store(StoreUserDocRequestRequest $request): JsonResponse
    {
        $this->authorize('create', UserDocRequest::class);

        $user_doc_request = $request->fill(new UserDocRequest);

        $user_doc_request->user_id = auth()->user()->id;

        $user_doc_request->save();
        $user_doc_request->loadIncludes();

        return response()->resource(new UserDocRequestResource($user_doc_request))
                ->message(__('crud.create', ['item' => __('model.UserDocRequest')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateUserDocRequestRequest  $request
     * @param  UserDocRequest $user_doc_request
     * @return JsonResponse
     */
    public function update(UpdateUserDocRequestRequest $request, UserDocRequest $user_doc_request): JsonResponse
    {
        $this->authorize('update', $user_doc_request);

        $request->fill($user_doc_request);
        
        $user_doc_request->update();
        $user_doc_request->loadIncludes();

        return response()->resource(new UserDocRequestResource($user_doc_request))
                ->message(__('crud.update', ['item' => __('model.UserDocRequest')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  UserDocRequest $user_doc_request
     * @return JsonResponse
     */
    public function show(UserDocRequest $user_doc_request): JsonResponse
    {
        $this->authorize('view', $user_doc_request);

        $user_doc_request->loadIncludes();

        return response()->resource(new UserDocRequestResource($user_doc_request));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  UserDocRequest  $user_doc_request
     * @return  JsonResponse
     */
    public function destroy(UserDocRequest $user_doc_request): JsonResponse
    {
        $this->authorize('delete', $user_doc_request);

        $user_doc_request->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.UserDocRequest')]));
    }
}
