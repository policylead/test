<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\NewsletterSubscription\NewsletterSubscriptionResource;
use App\Http\Resources\NewsletterSubscription\NewsletterSubscriptionCollection;
use App\Http\Requests\NewsletterSubscription\StoreNewsletterSubscriptionRequest;
use App\Http\Requests\NewsletterSubscription\UpdateNewsletterSubscriptionRequest;
use App\Models\NewsletterSubscription;

/**
 * @group NewsletterSubscription
 *
 * Endpoints for NewsletterSubscription entity
 */
class NewsletterSubscriptionController extends Controller
{

    /**
     * Create a new NewsletterSubscriptionController instance.
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
        $this->authorize('viewAny', NewsletterSubscription::class);

        $newsletter_subscriptions = NewsletterSubscription::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new NewsletterSubscriptionCollection($newsletter_subscriptions));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreNewsletterSubscriptionRequest  $request
     * @return JsonResponse
     */
    public function store(StoreNewsletterSubscriptionRequest $request): JsonResponse
    {
        $this->authorize('create', NewsletterSubscription::class);

        $newsletter_subscription = $request->fill(new NewsletterSubscription);

        $newsletter_subscription->save();
        $newsletter_subscription->loadIncludes();

        return response()->resource(new NewsletterSubscriptionResource($newsletter_subscription))
                ->message(__('crud.create', ['item' => __('model.NewsletterSubscription')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateNewsletterSubscriptionRequest  $request
     * @param  NewsletterSubscription $newsletter_subscription
     * @return JsonResponse
     */
    public function update(UpdateNewsletterSubscriptionRequest $request, NewsletterSubscription $newsletter_subscription): JsonResponse
    {
        $this->authorize('update', $newsletter_subscription);

        $request->fill($newsletter_subscription);
        
        $newsletter_subscription->update();
        $newsletter_subscription->loadIncludes();

        return response()->resource(new NewsletterSubscriptionResource($newsletter_subscription))
                ->message(__('crud.update', ['item' => __('model.NewsletterSubscription')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  NewsletterSubscription $newsletter_subscription
     * @return JsonResponse
     */
    public function show(NewsletterSubscription $newsletter_subscription): JsonResponse
    {
        $this->authorize('view', $newsletter_subscription);

        $newsletter_subscription->loadIncludes();

        return response()->resource(new NewsletterSubscriptionResource($newsletter_subscription));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  NewsletterSubscription  $newsletter_subscription
     * @return  JsonResponse
     */
    public function destroy(NewsletterSubscription $newsletter_subscription): JsonResponse
    {
        $this->authorize('delete', $newsletter_subscription);

        $newsletter_subscription->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.NewsletterSubscription')]));
    }
}
