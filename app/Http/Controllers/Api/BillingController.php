<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Billing\BillingResource;
use App\Http\Resources\Billing\BillingCollection;
use App\Http\Requests\Billing\StoreBillingRequest;
use App\Http\Requests\Billing\UpdateBillingRequest;
use App\Models\Billing;

/**
 * @group Billing
 *
 * Endpoints for Billing entity
 */
class BillingController extends Controller
{

    /**
     * Create a new BillingController instance.
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
        $this->authorize('viewAny', Billing::class);

        $billings = Billing::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BillingCollection($billings));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreBillingRequest  $request
     * @return JsonResponse
     */
    public function store(StoreBillingRequest $request): JsonResponse
    {
        $this->authorize('create', Billing::class);

        $billing = $request->fill(new Billing);

        $billing->user_id = auth()->user()->id;

        $billing->save();
        $billing->loadIncludes();

        return response()->resource(new BillingResource($billing))
                ->message(__('crud.create', ['item' => __('model.Billing')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateBillingRequest  $request
     * @param  Billing $billing
     * @return JsonResponse
     */
    public function update(UpdateBillingRequest $request, Billing $billing): JsonResponse
    {
        $this->authorize('update', $billing);

        $request->fill($billing);
        
        $billing->update();
        $billing->loadIncludes();

        return response()->resource(new BillingResource($billing))
                ->message(__('crud.update', ['item' => __('model.Billing')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Billing $billing
     * @return JsonResponse
     */
    public function show(Billing $billing): JsonResponse
    {
        $this->authorize('view', $billing);

        $billing->loadIncludes();

        return response()->resource(new BillingResource($billing));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Billing  $billing
     * @return  JsonResponse
     */
    public function destroy(Billing $billing): JsonResponse
    {
        $this->authorize('delete', $billing);

        $billing->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Billing')]));
    }
}
