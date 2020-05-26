<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ClientFeedReportAssociation\ClientFeedReportAssociationResource;
use App\Http\Resources\ClientFeedReportAssociation\ClientFeedReportAssociationCollection;
use App\Http\Requests\ClientFeedReportAssociation\StoreClientFeedReportAssociationRequest;
use App\Http\Requests\ClientFeedReportAssociation\UpdateClientFeedReportAssociationRequest;
use App\Models\ClientFeedReportAssociation;

/**
 * @group ClientFeedReportAssociation
 *
 * Endpoints for ClientFeedReportAssociation entity
 */
class ClientFeedReportAssociationController extends Controller
{

    /**
     * Create a new ClientFeedReportAssociationController instance.
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
        $this->authorize('viewAny', ClientFeedReportAssociation::class);

        $client_feed_report_associations = ClientFeedReportAssociation::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ClientFeedReportAssociationCollection($client_feed_report_associations));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreClientFeedReportAssociationRequest  $request
     * @return JsonResponse
     */
    public function store(StoreClientFeedReportAssociationRequest $request): JsonResponse
    {
        $this->authorize('create', ClientFeedReportAssociation::class);

        $client_feed_report_association = $request->fill(new ClientFeedReportAssociation);

        $client_feed_report_association->save();
        $client_feed_report_association->loadIncludes();

        return response()->resource(new ClientFeedReportAssociationResource($client_feed_report_association))
                ->message(__('crud.create', ['item' => __('model.ClientFeedReportAssociation')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateClientFeedReportAssociationRequest  $request
     * @param  ClientFeedReportAssociation $client_feed_report_association
     * @return JsonResponse
     */
    public function update(UpdateClientFeedReportAssociationRequest $request, ClientFeedReportAssociation $client_feed_report_association): JsonResponse
    {
        $this->authorize('update', $client_feed_report_association);

        $request->fill($client_feed_report_association);
        
        $client_feed_report_association->update();
        $client_feed_report_association->loadIncludes();

        return response()->resource(new ClientFeedReportAssociationResource($client_feed_report_association))
                ->message(__('crud.update', ['item' => __('model.ClientFeedReportAssociation')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ClientFeedReportAssociation $client_feed_report_association
     * @return JsonResponse
     */
    public function show(ClientFeedReportAssociation $client_feed_report_association): JsonResponse
    {
        $this->authorize('view', $client_feed_report_association);

        $client_feed_report_association->loadIncludes();

        return response()->resource(new ClientFeedReportAssociationResource($client_feed_report_association));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ClientFeedReportAssociation  $client_feed_report_association
     * @return  JsonResponse
     */
    public function destroy(ClientFeedReportAssociation $client_feed_report_association): JsonResponse
    {
        $this->authorize('delete', $client_feed_report_association);

        $client_feed_report_association->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ClientFeedReportAssociation')]));
    }
}
