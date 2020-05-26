<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\FacebookAccount\FacebookAccountResource;
use App\Http\Resources\FacebookAccount\FacebookAccountCollection;
use App\Http\Requests\FacebookAccount\StoreFacebookAccountRequest;
use App\Http\Requests\FacebookAccount\UpdateFacebookAccountRequest;
use App\Models\FacebookAccount;

/**
 * @group FacebookAccount
 *
 * Endpoints for FacebookAccount entity
 */
class FacebookAccountController extends Controller
{

    /**
     * Create a new FacebookAccountController instance.
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
        $this->authorize('viewAny', FacebookAccount::class);

        $facebook_accounts = FacebookAccount::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new FacebookAccountCollection($facebook_accounts));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreFacebookAccountRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFacebookAccountRequest $request): JsonResponse
    {
        $this->authorize('create', FacebookAccount::class);

        $facebook_account = $request->fill(new FacebookAccount);

        $facebook_account->save();
        $facebook_account->loadIncludes();

        return response()->resource(new FacebookAccountResource($facebook_account))
                ->message(__('crud.create', ['item' => __('model.FacebookAccount')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateFacebookAccountRequest  $request
     * @param  FacebookAccount $facebook_account
     * @return JsonResponse
     */
    public function update(UpdateFacebookAccountRequest $request, FacebookAccount $facebook_account): JsonResponse
    {
        $this->authorize('update', $facebook_account);

        $request->fill($facebook_account);
        
        $facebook_account->update();
        $facebook_account->loadIncludes();

        return response()->resource(new FacebookAccountResource($facebook_account))
                ->message(__('crud.update', ['item' => __('model.FacebookAccount')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  FacebookAccount $facebook_account
     * @return JsonResponse
     */
    public function show(FacebookAccount $facebook_account): JsonResponse
    {
        $this->authorize('view', $facebook_account);

        $facebook_account->loadIncludes();

        return response()->resource(new FacebookAccountResource($facebook_account));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  FacebookAccount  $facebook_account
     * @return  JsonResponse
     */
    public function destroy(FacebookAccount $facebook_account): JsonResponse
    {
        $this->authorize('delete', $facebook_account);

        $facebook_account->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.FacebookAccount')]));
    }
}
