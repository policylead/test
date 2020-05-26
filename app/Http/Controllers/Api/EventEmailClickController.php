<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\EventEmailClick\EventEmailClickResource;
use App\Http\Resources\EventEmailClick\EventEmailClickCollection;
use App\Http\Requests\EventEmailClick\StoreEventEmailClickRequest;
use App\Http\Requests\EventEmailClick\UpdateEventEmailClickRequest;
use App\Models\EventEmailClick;

/**
 * @group EventEmailClick
 *
 * Endpoints for EventEmailClick entity
 */
class EventEmailClickController extends Controller
{

    /**
     * Create a new EventEmailClickController instance.
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
        $this->authorize('viewAny', EventEmailClick::class);

        $event_email_clicks = EventEmailClick::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new EventEmailClickCollection($event_email_clicks));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreEventEmailClickRequest  $request
     * @return JsonResponse
     */
    public function store(StoreEventEmailClickRequest $request): JsonResponse
    {
        $this->authorize('create', EventEmailClick::class);

        $event_email_click = $request->fill(new EventEmailClick);

        $event_email_click->user_id = auth()->user()->id;

        $event_email_click->save();
        $event_email_click->loadIncludes();

        return response()->resource(new EventEmailClickResource($event_email_click))
                ->message(__('crud.create', ['item' => __('model.EventEmailClick')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateEventEmailClickRequest  $request
     * @param  EventEmailClick $event_email_click
     * @return JsonResponse
     */
    public function update(UpdateEventEmailClickRequest $request, EventEmailClick $event_email_click): JsonResponse
    {
        $this->authorize('update', $event_email_click);

        $request->fill($event_email_click);
        
        $event_email_click->update();
        $event_email_click->loadIncludes();

        return response()->resource(new EventEmailClickResource($event_email_click))
                ->message(__('crud.update', ['item' => __('model.EventEmailClick')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  EventEmailClick $event_email_click
     * @return JsonResponse
     */
    public function show(EventEmailClick $event_email_click): JsonResponse
    {
        $this->authorize('view', $event_email_click);

        $event_email_click->loadIncludes();

        return response()->resource(new EventEmailClickResource($event_email_click));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  EventEmailClick  $event_email_click
     * @return  JsonResponse
     */
    public function destroy(EventEmailClick $event_email_click): JsonResponse
    {
        $this->authorize('delete', $event_email_click);

        $event_email_click->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.EventEmailClick')]));
    }
}
