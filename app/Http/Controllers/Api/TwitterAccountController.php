<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\TwitterAccount\TwitterAccountResource;
use App\Http\Resources\TwitterAccount\TwitterAccountCollection;
use App\Http\Requests\TwitterAccount\StoreTwitterAccountRequest;
use App\Http\Requests\TwitterAccount\UpdateTwitterAccountRequest;
use App\Models\TwitterAccount;

/**
 * @group TwitterAccount
 *
 * Endpoints for TwitterAccount entity
 */
class TwitterAccountController extends Controller
{

    /**
     * Create a new TwitterAccountController instance.
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
        $this->authorize('viewAny', TwitterAccount::class);

        $twitter_accounts = TwitterAccount::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new TwitterAccountCollection($twitter_accounts));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreTwitterAccountRequest  $request
     * @return JsonResponse
     */
    public function store(StoreTwitterAccountRequest $request): JsonResponse
    {
        $this->authorize('create', TwitterAccount::class);

        $twitter_account = $request->fill(new TwitterAccount);

        $twitter_account->save();
        $twitter_account->loadIncludes();

        return response()->resource(new TwitterAccountResource($twitter_account))
                ->message(__('crud.create', ['item' => __('model.TwitterAccount')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateTwitterAccountRequest  $request
     * @param  TwitterAccount $twitter_account
     * @return JsonResponse
     */
    public function update(UpdateTwitterAccountRequest $request, TwitterAccount $twitter_account): JsonResponse
    {
        $this->authorize('update', $twitter_account);

        $request->fill($twitter_account);
        
        $twitter_account->update();
        $twitter_account->loadIncludes();

        return response()->resource(new TwitterAccountResource($twitter_account))
                ->message(__('crud.update', ['item' => __('model.TwitterAccount')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  TwitterAccount $twitter_account
     * @return JsonResponse
     */
    public function show(TwitterAccount $twitter_account): JsonResponse
    {
        $this->authorize('view', $twitter_account);

        $twitter_account->loadIncludes();

        return response()->resource(new TwitterAccountResource($twitter_account));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  TwitterAccount  $twitter_account
     * @return  JsonResponse
     */
    public function destroy(TwitterAccount $twitter_account): JsonResponse
    {
        $this->authorize('delete', $twitter_account);

        $twitter_account->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.TwitterAccount')]));
    }
}
