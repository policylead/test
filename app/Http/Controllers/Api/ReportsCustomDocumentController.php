<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportsCustomDocument\ReportsCustomDocumentResource;
use App\Http\Resources\ReportsCustomDocument\ReportsCustomDocumentCollection;
use App\Http\Requests\ReportsCustomDocument\StoreReportsCustomDocumentRequest;
use App\Http\Requests\ReportsCustomDocument\UpdateReportsCustomDocumentRequest;
use App\Models\ReportsCustomDocument;

/**
 * @group ReportsCustomDocument
 *
 * Endpoints for ReportsCustomDocument entity
 */
class ReportsCustomDocumentController extends Controller
{

    /**
     * Create a new ReportsCustomDocumentController instance.
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
        $this->authorize('viewAny', ReportsCustomDocument::class);

        $reports_custom_documents = ReportsCustomDocument::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomDocumentCollection($reports_custom_documents));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsCustomDocumentRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsCustomDocumentRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsCustomDocument::class);

        $reports_custom_document = $request->fill(new ReportsCustomDocument);
        if ($provider_logo = $request->file('provider_logo')) {
            $reports_custom_document->provider_logo = $provider_logo->store(config('storage.reports_custom_documents.provider_logo'));
        }
        if ($article_image = $request->file('article_image')) {
            $reports_custom_document->article_image = $article_image->store(config('storage.reports_custom_documents.article_image'));
        }

        $reports_custom_document->user_id = auth()->user()->id;

        $reports_custom_document->save();
        $reports_custom_document->loadIncludes();

        return response()->resource(new ReportsCustomDocumentResource($reports_custom_document))
                ->message(__('crud.create', ['item' => __('model.ReportsCustomDocument')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsCustomDocumentRequest  $request
     * @param  ReportsCustomDocument $reports_custom_document
     * @return JsonResponse
     */
    public function update(UpdateReportsCustomDocumentRequest $request, ReportsCustomDocument $reports_custom_document): JsonResponse
    {
        $this->authorize('update', $reports_custom_document);

        $request->fill($reports_custom_document);
        if ($provider_logo = $request->file('provider_logo')) {
            \Storage::delete($reports_custom_document->getOriginal('provider_logo'));
            $reports_custom_document->provider_logo = $provider_logo->store(config('storage.reports_custom_documents.provider_logo'));
        }

        if ($article_image = $request->file('article_image')) {
            \Storage::delete($reports_custom_document->getOriginal('article_image'));
            $reports_custom_document->article_image = $article_image->store(config('storage.reports_custom_documents.article_image'));
        }

        $reports_custom_document->update();
        $reports_custom_document->loadIncludes();

        return response()->resource(new ReportsCustomDocumentResource($reports_custom_document))
                ->message(__('crud.update', ['item' => __('model.ReportsCustomDocument')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsCustomDocument $reports_custom_document
     * @return JsonResponse
     */
    public function show(ReportsCustomDocument $reports_custom_document): JsonResponse
    {
        $this->authorize('view', $reports_custom_document);

        $reports_custom_document->loadIncludes();

        return response()->resource(new ReportsCustomDocumentResource($reports_custom_document));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsCustomDocument  $reports_custom_document
     * @return  JsonResponse
     */
    public function destroy(ReportsCustomDocument $reports_custom_document): JsonResponse
    {
        $this->authorize('delete', $reports_custom_document);

        $reports_custom_document->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsCustomDocument')]));
    }
}
