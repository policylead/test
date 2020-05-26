<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportsCustomProvider\ReportsCustomProviderResource;
use App\Http\Resources\ReportsCustomProvider\ReportsCustomProviderCollection;
use App\Http\Requests\ReportsCustomProvider\StoreReportsCustomProviderRequest;
use App\Http\Requests\ReportsCustomProvider\UpdateReportsCustomProviderRequest;
use App\Models\ReportsCustomProvider;

/**
 * @group ReportsCustomProvider
 *
 * Endpoints for ReportsCustomProvider entity
 */
class ReportsCustomProviderController extends Controller
{

    /**
     * Create a new ReportsCustomProviderController instance.
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
        $this->authorize('viewAny', ReportsCustomProvider::class);

        $reports_custom_providers = ReportsCustomProvider::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomProviderCollection($reports_custom_providers));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsCustomProviderRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsCustomProviderRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsCustomProvider::class);

        $reports_custom_provider = $request->fill(new ReportsCustomProvider);
        if ($logo = $request->file('logo')) {
            $reports_custom_provider->logo = $logo->store(config('storage.reports_custom_providers.logo'));
        }

        $reports_custom_provider->user_id = auth()->user()->id;

        $reports_custom_provider->save();
        $reports_custom_provider->loadIncludes();

        return response()->resource(new ReportsCustomProviderResource($reports_custom_provider))
                ->message(__('crud.create', ['item' => __('model.ReportsCustomProvider')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsCustomProviderRequest  $request
     * @param  ReportsCustomProvider $reports_custom_provider
     * @return JsonResponse
     */
    public function update(UpdateReportsCustomProviderRequest $request, ReportsCustomProvider $reports_custom_provider): JsonResponse
    {
        $this->authorize('update', $reports_custom_provider);

        $request->fill($reports_custom_provider);
        if ($logo = $request->file('logo')) {
            \Storage::delete($reports_custom_provider->getOriginal('logo'));
            $reports_custom_provider->logo = $logo->store(config('storage.reports_custom_providers.logo'));
        }

        $reports_custom_provider->update();
        $reports_custom_provider->loadIncludes();

        return response()->resource(new ReportsCustomProviderResource($reports_custom_provider))
                ->message(__('crud.update', ['item' => __('model.ReportsCustomProvider')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsCustomProvider $reports_custom_provider
     * @return JsonResponse
     */
    public function show(ReportsCustomProvider $reports_custom_provider): JsonResponse
    {
        $this->authorize('view', $reports_custom_provider);

        $reports_custom_provider->loadIncludes();

        return response()->resource(new ReportsCustomProviderResource($reports_custom_provider));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsCustomProvider  $reports_custom_provider
     * @return  JsonResponse
     */
    public function destroy(ReportsCustomProvider $reports_custom_provider): JsonResponse
    {
        $this->authorize('delete', $reports_custom_provider);

        $reports_custom_provider->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsCustomProvider')]));
    }
}
