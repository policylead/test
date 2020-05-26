<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\DocumentsTemp\DocumentsTempResource;
use App\Http\Resources\DocumentsTemp\DocumentsTempCollection;
use App\Http\Requests\DocumentsTemp\StoreDocumentsTempRequest;
use App\Http\Requests\DocumentsTemp\UpdateDocumentsTempRequest;
use App\Models\DocumentsTemp;

/**
 * @group DocumentsTemp
 *
 * Endpoints for DocumentsTemp entity
 */
class DocumentsTempController extends Controller
{

    /**
     * Create a new DocumentsTempController instance.
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
        $this->authorize('viewAny', DocumentsTemp::class);

        $documents_temps = DocumentsTemp::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentsTempCollection($documents_temps));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDocumentsTempRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDocumentsTempRequest $request): JsonResponse
    {
        $this->authorize('create', DocumentsTemp::class);

        $documents_temp = $request->fill(new DocumentsTemp);

        $documents_temp->save();
        $documents_temp->loadIncludes();

        return response()->resource(new DocumentsTempResource($documents_temp))
                ->message(__('crud.create', ['item' => __('model.DocumentsTemp')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDocumentsTempRequest  $request
     * @param  DocumentsTemp $documents_temp
     * @return JsonResponse
     */
    public function update(UpdateDocumentsTempRequest $request, DocumentsTemp $documents_temp): JsonResponse
    {
        $this->authorize('update', $documents_temp);

        $request->fill($documents_temp);
        
        $documents_temp->update();
        $documents_temp->loadIncludes();

        return response()->resource(new DocumentsTempResource($documents_temp))
                ->message(__('crud.update', ['item' => __('model.DocumentsTemp')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  DocumentsTemp $documents_temp
     * @return JsonResponse
     */
    public function show(DocumentsTemp $documents_temp): JsonResponse
    {
        $this->authorize('view', $documents_temp);

        $documents_temp->loadIncludes();

        return response()->resource(new DocumentsTempResource($documents_temp));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  DocumentsTemp  $documents_temp
     * @return  JsonResponse
     */
    public function destroy(DocumentsTemp $documents_temp): JsonResponse
    {
        $this->authorize('delete', $documents_temp);

        $documents_temp->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.DocumentsTemp')]));
    }
}
