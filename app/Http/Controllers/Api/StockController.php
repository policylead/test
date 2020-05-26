<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Stock\StockResource;
use App\Http\Resources\Stock\StockCollection;
use App\Http\Requests\Stock\StoreStockRequest;
use App\Http\Requests\Stock\UpdateStockRequest;
use App\Models\Stock;

/**
 * @group Stock
 *
 * Endpoints for Stock entity
 */
class StockController extends Controller
{

    /**
     * Create a new StockController instance.
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
        $this->authorize('viewAny', Stock::class);

        $stocks = Stock::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StockCollection($stocks));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreStockRequest  $request
     * @return JsonResponse
     */
    public function store(StoreStockRequest $request): JsonResponse
    {
        $this->authorize('create', Stock::class);

        $stock = $request->fill(new Stock);

        $stock->save();
        $stock->loadIncludes();

        return response()->resource(new StockResource($stock))
                ->message(__('crud.create', ['item' => __('model.Stock')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateStockRequest  $request
     * @param  Stock $stock
     * @return JsonResponse
     */
    public function update(UpdateStockRequest $request, Stock $stock): JsonResponse
    {
        $this->authorize('update', $stock);

        $request->fill($stock);
        
        $stock->update();
        $stock->loadIncludes();

        return response()->resource(new StockResource($stock))
                ->message(__('crud.update', ['item' => __('model.Stock')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Stock $stock
     * @return JsonResponse
     */
    public function show(Stock $stock): JsonResponse
    {
        $this->authorize('view', $stock);

        $stock->loadIncludes();

        return response()->resource(new StockResource($stock));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Stock  $stock
     * @return  JsonResponse
     */
    public function destroy(Stock $stock): JsonResponse
    {
        $this->authorize('delete', $stock);

        $stock->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Stock')]));
    }
}
