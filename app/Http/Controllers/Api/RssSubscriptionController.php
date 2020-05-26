<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\RssSubscription\RssSubscriptionResource;
use App\Http\Resources\RssSubscription\RssSubscriptionCollection;
use App\Http\Requests\RssSubscription\StoreRssSubscriptionRequest;
use App\Http\Requests\RssSubscription\UpdateRssSubscriptionRequest;
use App\Models\RssSubscription;

/**
 * @group RssSubscription
 *
 * Endpoints for RssSubscription entity
 */
class RssSubscriptionController extends Controller
{

    /**
     * Create a new RssSubscriptionController instance.
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
        $this->authorize('viewAny', RssSubscription::class);

        $rss_subscriptions = RssSubscription::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new RssSubscriptionCollection($rss_subscriptions));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreRssSubscriptionRequest  $request
     * @return JsonResponse
     */
    public function store(StoreRssSubscriptionRequest $request): JsonResponse
    {
        $this->authorize('create', RssSubscription::class);

        $rss_subscription = $request->fill(new RssSubscription);

        $rss_subscription->save();
        $rss_subscription->loadIncludes();

        return response()->resource(new RssSubscriptionResource($rss_subscription))
                ->message(__('crud.create', ['item' => __('model.RssSubscription')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateRssSubscriptionRequest  $request
     * @param  RssSubscription $rss_subscription
     * @return JsonResponse
     */
    public function update(UpdateRssSubscriptionRequest $request, RssSubscription $rss_subscription): JsonResponse
    {
        $this->authorize('update', $rss_subscription);

        $request->fill($rss_subscription);
        
        $rss_subscription->update();
        $rss_subscription->loadIncludes();

        return response()->resource(new RssSubscriptionResource($rss_subscription))
                ->message(__('crud.update', ['item' => __('model.RssSubscription')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  RssSubscription $rss_subscription
     * @return JsonResponse
     */
    public function show(RssSubscription $rss_subscription): JsonResponse
    {
        $this->authorize('view', $rss_subscription);

        $rss_subscription->loadIncludes();

        return response()->resource(new RssSubscriptionResource($rss_subscription));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  RssSubscription  $rss_subscription
     * @return  JsonResponse
     */
    public function destroy(RssSubscription $rss_subscription): JsonResponse
    {
        $this->authorize('delete', $rss_subscription);

        $rss_subscription->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.RssSubscription')]));
    }
}
