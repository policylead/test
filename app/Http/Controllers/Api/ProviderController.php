<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Document\DocumentCollection;
use App\Http\Resources\Feed\FeedCollection;
use App\Http\Resources\Provider\ProviderResource;
use App\Http\Resources\Provider\ProviderCollection;
use App\Http\Requests\Provider\StoreProviderRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Models\Provider;
use App\Models\Document;
use App\Models\Feed;

/**
 * @group Provider
 *
 * Endpoints for Provider entity
 */
class ProviderController extends Controller
{

    /**
     * Create a new ProviderController instance.
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
        $this->authorize('viewAny', Provider::class);

        $providers = Provider::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ProviderCollection($providers));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreProviderRequest  $request
     * @return JsonResponse
     */
    public function store(StoreProviderRequest $request): JsonResponse
    {
        $this->authorize('create', Provider::class);

        $provider = $request->fill(new Provider);

        $provider->save();
        $provider->loadIncludes();

        return response()->resource(new ProviderResource($provider))
                ->message(__('crud.create', ['item' => __('model.Provider')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateProviderRequest  $request
     * @param  Provider $provider
     * @return JsonResponse
     */
    public function update(UpdateProviderRequest $request, Provider $provider): JsonResponse
    {
        $this->authorize('update', $provider);

        $request->fill($provider);
        
        $provider->update();
        $provider->loadIncludes();

        return response()->resource(new ProviderResource($provider))
                ->message(__('crud.update', ['item' => __('model.Provider')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Provider $provider
     * @return JsonResponse
     */
    public function show(Provider $provider): JsonResponse
    {
        $this->authorize('view', $provider);

        $provider->loadIncludes();

        return response()->resource(new ProviderResource($provider));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Provider  $provider
     * @return  JsonResponse
     */
    public function destroy(Provider $provider): JsonResponse
    {
        $this->authorize('delete', $provider);

        $provider->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Provider')]));
    }

    /**
     * Search Documents for Provider with given $id
     *
     * Documents from existing resource.
     *
     * @param Request $request
     * @param Provider $provider
     * @return JsonResponse
     */
    public function searchDocuments(Request $request, Provider $provider): JsonResponse
    {
        $this->authorize('searchDocuments', $provider);

        $documents = $provider->documents()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCollection($documents));
    }

    /**
     * Search Feeds for Provider with given $id
     *
     * Feeds from existing resource.
     *
     * @param Request $request
     * @param Provider $provider
     * @return JsonResponse
     */
    public function searchFeeds(Request $request, Provider $provider): JsonResponse
    {
        $this->authorize('searchFeeds', $provider);

        $feeds = $provider->feeds()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new FeedCollection($feeds));
    }
}
