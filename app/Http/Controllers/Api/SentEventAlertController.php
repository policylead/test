<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\SentEventAlert\SentEventAlertResource;
use App\Http\Resources\SentEventAlert\SentEventAlertCollection;
use App\Http\Requests\SentEventAlert\StoreSentEventAlertRequest;
use App\Http\Requests\SentEventAlert\UpdateSentEventAlertRequest;
use App\Models\SentEventAlert;

/**
 * @group SentEventAlert
 *
 * Endpoints for SentEventAlert entity
 */
class SentEventAlertController extends Controller
{

    /**
     * Create a new SentEventAlertController instance.
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
        $this->authorize('viewAny', SentEventAlert::class);

        $sent_event_alerts = SentEventAlert::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new SentEventAlertCollection($sent_event_alerts));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreSentEventAlertRequest  $request
     * @return JsonResponse
     */
    public function store(StoreSentEventAlertRequest $request): JsonResponse
    {
        $this->authorize('create', SentEventAlert::class);

        $sent_event_alert = $request->fill(new SentEventAlert);

        $sent_event_alert->user_id = auth()->user()->id;

        $sent_event_alert->save();
        $sent_event_alert->loadIncludes();

        return response()->resource(new SentEventAlertResource($sent_event_alert))
                ->message(__('crud.create', ['item' => __('model.SentEventAlert')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateSentEventAlertRequest  $request
     * @param  SentEventAlert $sent_event_alert
     * @return JsonResponse
     */
    public function update(UpdateSentEventAlertRequest $request, SentEventAlert $sent_event_alert): JsonResponse
    {
        $this->authorize('update', $sent_event_alert);

        $request->fill($sent_event_alert);
        
        $sent_event_alert->update();
        $sent_event_alert->loadIncludes();

        return response()->resource(new SentEventAlertResource($sent_event_alert))
                ->message(__('crud.update', ['item' => __('model.SentEventAlert')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  SentEventAlert $sent_event_alert
     * @return JsonResponse
     */
    public function show(SentEventAlert $sent_event_alert): JsonResponse
    {
        $this->authorize('view', $sent_event_alert);

        $sent_event_alert->loadIncludes();

        return response()->resource(new SentEventAlertResource($sent_event_alert));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  SentEventAlert  $sent_event_alert
     * @return  JsonResponse
     */
    public function destroy(SentEventAlert $sent_event_alert): JsonResponse
    {
        $this->authorize('delete', $sent_event_alert);

        $sent_event_alert->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.SentEventAlert')]));
    }
}
