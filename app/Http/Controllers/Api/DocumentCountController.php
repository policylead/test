<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\DocumentCount\DocumentCountResource;
use App\Http\Resources\DocumentCount\DocumentCountCollection;
use App\Http\Requests\DocumentCount\StoreDocumentCountRequest;
use App\Http\Requests\DocumentCount\UpdateDocumentCountRequest;
use App\Models\DocumentCount;

/**
 * @group DocumentCount
 *
 * Endpoints for DocumentCount entity
 */
class DocumentCountController extends Controller
{

    /**
     * Create a new DocumentCountController instance.
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
        $this->authorize('viewAny', DocumentCount::class);

        $document_counts = DocumentCount::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCountCollection($document_counts));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDocumentCountRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDocumentCountRequest $request): JsonResponse
    {
        $this->authorize('create', DocumentCount::class);

        $document_count = $request->fill(new DocumentCount);

        $document_count->user_id = auth()->user()->id;

        $document_count->save();
        $document_count->loadIncludes();

        return response()->resource(new DocumentCountResource($document_count))
                ->message(__('crud.create', ['item' => __('model.DocumentCount')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDocumentCountRequest  $request
     * @param  DocumentCount $document_count
     * @return JsonResponse
     */
    public function update(UpdateDocumentCountRequest $request, DocumentCount $document_count): JsonResponse
    {
        $this->authorize('update', $document_count);

        $request->fill($document_count);
        
        $document_count->update();
        $document_count->loadIncludes();

        return response()->resource(new DocumentCountResource($document_count))
                ->message(__('crud.update', ['item' => __('model.DocumentCount')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  DocumentCount $document_count
     * @return JsonResponse
     */
    public function show(DocumentCount $document_count): JsonResponse
    {
        $this->authorize('view', $document_count);

        $document_count->loadIncludes();

        return response()->resource(new DocumentCountResource($document_count));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  DocumentCount  $document_count
     * @return  JsonResponse
     */
    public function destroy(DocumentCount $document_count): JsonResponse
    {
        $this->authorize('delete', $document_count);

        $document_count->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.DocumentCount')]));
    }
}
