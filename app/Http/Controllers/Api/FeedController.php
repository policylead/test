<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\FeedsManual\FeedsManualCollection;
use App\Http\Resources\RssSubscription\RssSubscriptionCollection;
use App\Http\Resources\Feed\FeedResource;
use App\Http\Resources\Feed\FeedCollection;
use App\Http\Requests\Feed\StoreFeedRequest;
use App\Http\Requests\Feed\UpdateFeedRequest;
use App\Models\Feed;
use App\Models\FeedsManual;
use App\Models\RssSubscription;

/**
 * @group Feed
 *
 * Endpoints for Feed entity
 */
class FeedController extends Controller
{

    /**
     * Create a new FeedController instance.
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
        $this->authorize('viewAny', Feed::class);

        $feeds = Feed::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new FeedCollection($feeds));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreFeedRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFeedRequest $request): JsonResponse
    {
        $this->authorize('create', Feed::class);

        $feed = $request->fill(new Feed);

        $feed->save();
        $feed->loadIncludes();

        return response()->resource(new FeedResource($feed))
                ->message(__('crud.create', ['item' => __('model.Feed')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateFeedRequest  $request
     * @param  Feed $feed
     * @return JsonResponse
     */
    public function update(UpdateFeedRequest $request, Feed $feed): JsonResponse
    {
        $this->authorize('update', $feed);

        $request->fill($feed);
        
        $feed->update();
        $feed->loadIncludes();

        return response()->resource(new FeedResource($feed))
                ->message(__('crud.update', ['item' => __('model.Feed')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Feed $feed
     * @return JsonResponse
     */
    public function show(Feed $feed): JsonResponse
    {
        $this->authorize('view', $feed);

        $feed->loadIncludes();

        return response()->resource(new FeedResource($feed));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Feed  $feed
     * @return  JsonResponse
     */
    public function destroy(Feed $feed): JsonResponse
    {
        $this->authorize('delete', $feed);

        $feed->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Feed')]));
    }

    /**
     * Search FeedsManuals for Feed with given $id
     *
     * FeedsManuals from existing resource.
     *
     * @param Request $request
     * @param Feed $feed
     * @return JsonResponse
     */
    public function searchFeedsManuals(Request $request, Feed $feed): JsonResponse
    {
        $this->authorize('searchFeedsManuals', $feed);

        $feedsManuals = $feed->feedsManuals()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new FeedsManualCollection($feedsManuals));
    }

    /**
     * Search RssSubscriptions for Feed with given $id
     *
     * RssSubscriptions from existing resource.
     *
     * @param Request $request
     * @param Feed $feed
     * @return JsonResponse
     */
    public function searchRssSubscriptions(Request $request, Feed $feed): JsonResponse
    {
        $this->authorize('searchRssSubscriptions', $feed);

        $rssSubscriptions = $feed->rssSubscriptions()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new RssSubscriptionCollection($rssSubscriptions));
    }
}
