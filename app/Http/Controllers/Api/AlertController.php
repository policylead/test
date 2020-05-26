<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Alert\AlertResource;
use App\Http\Resources\Alert\AlertCollection;
use App\Http\Requests\Alert\StoreAlertRequest;
use App\Http\Requests\Alert\UpdateAlertRequest;
use App\Models\Alert;

/**
 * @group Alert
 *
 * Endpoints for Alert entity
 */
class AlertController extends Controller
{

    /**
     * Create a new AlertController instance.
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
        $this->authorize('viewAny', Alert::class);

        $alerts = Alert::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new AlertCollection($alerts));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreAlertRequest  $request
     * @return JsonResponse
     */
    public function store(StoreAlertRequest $request): JsonResponse
    {
        $this->authorize('create', Alert::class);

        $alert = $request->fill(new Alert);

        $alert->user_id = auth()->user()->id;

        $alert->save();
        $alert->loadIncludes();

        return response()->resource(new AlertResource($alert))
                ->message(__('crud.create', ['item' => __('model.Alert')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateAlertRequest  $request
     * @param  Alert $alert
     * @return JsonResponse
     */
    public function update(UpdateAlertRequest $request, Alert $alert): JsonResponse
    {
        $this->authorize('update', $alert);

        $request->fill($alert);
        
        $alert->update();
        $alert->loadIncludes();

        return response()->resource(new AlertResource($alert))
                ->message(__('crud.update', ['item' => __('model.Alert')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Alert $alert
     * @return JsonResponse
     */
    public function show(Alert $alert): JsonResponse
    {
        $this->authorize('view', $alert);

        $alert->loadIncludes();

        return response()->resource(new AlertResource($alert));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Alert  $alert
     * @return  JsonResponse
     */
    public function destroy(Alert $alert): JsonResponse
    {
        $this->authorize('delete', $alert);

        $alert->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Alert')]));
    }
}
