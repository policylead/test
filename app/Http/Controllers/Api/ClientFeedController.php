<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ClientFeedReportAssociation\ClientFeedReportAssociationCollection;
use App\Http\Resources\ClientFeed\ClientFeedResource;
use App\Http\Resources\ClientFeed\ClientFeedCollection;
use App\Http\Requests\ClientFeed\StoreClientFeedRequest;
use App\Http\Requests\ClientFeed\UpdateClientFeedRequest;
use App\Models\ClientFeed;
use App\Models\ClientFeedReportAssociation;

/**
 * @group ClientFeed
 *
 * Endpoints for ClientFeed entity
 */
class ClientFeedController extends Controller
{

    /**
     * Create a new ClientFeedController instance.
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
        $this->authorize('viewAny', ClientFeed::class);

        $client_feeds = ClientFeed::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ClientFeedCollection($client_feeds));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreClientFeedRequest  $request
     * @return JsonResponse
     */
    public function store(StoreClientFeedRequest $request): JsonResponse
    {
        $this->authorize('create', ClientFeed::class);

        $client_feed = $request->fill(new ClientFeed);

        $client_feed->user_id = auth()->user()->id;

        $client_feed->save();
        $client_feed->loadIncludes();

        return response()->resource(new ClientFeedResource($client_feed))
                ->message(__('crud.create', ['item' => __('model.ClientFeed')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateClientFeedRequest  $request
     * @param  ClientFeed $client_feed
     * @return JsonResponse
     */
    public function update(UpdateClientFeedRequest $request, ClientFeed $client_feed): JsonResponse
    {
        $this->authorize('update', $client_feed);

        $request->fill($client_feed);
        
        $client_feed->update();
        $client_feed->loadIncludes();

        return response()->resource(new ClientFeedResource($client_feed))
                ->message(__('crud.update', ['item' => __('model.ClientFeed')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ClientFeed $client_feed
     * @return JsonResponse
     */
    public function show(ClientFeed $client_feed): JsonResponse
    {
        $this->authorize('view', $client_feed);

        $client_feed->loadIncludes();

        return response()->resource(new ClientFeedResource($client_feed));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ClientFeed  $client_feed
     * @return  JsonResponse
     */
    public function destroy(ClientFeed $client_feed): JsonResponse
    {
        $this->authorize('delete', $client_feed);

        $client_feed->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ClientFeed')]));
    }

    /**
     * Search ClientFeedReportAssociations for ClientFeed with given $id
     *
     * ClientFeedReportAssociations from existing resource.
     *
     * @param Request $request
     * @param ClientFeed $client_feed
     * @return JsonResponse
     */
    public function searchClientFeedReportAssociations(Request $request, ClientFeed $client_feed): JsonResponse
    {
        $this->authorize('searchClientFeedReportAssociations', $client_feed);

        $clientFeedReportAssociations = $client_feed->clientFeedReportAssociations()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ClientFeedReportAssociationCollection($clientFeedReportAssociations));
    }
}
