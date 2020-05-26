<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportsCustomDocumentImage\ReportsCustomDocumentImageResource;
use App\Http\Resources\ReportsCustomDocumentImage\ReportsCustomDocumentImageCollection;
use App\Http\Requests\ReportsCustomDocumentImage\StoreReportsCustomDocumentImageRequest;
use App\Http\Requests\ReportsCustomDocumentImage\UpdateReportsCustomDocumentImageRequest;
use App\Models\ReportsCustomDocumentImage;

/**
 * @group ReportsCustomDocumentImage
 *
 * Endpoints for ReportsCustomDocumentImage entity
 */
class ReportsCustomDocumentImageController extends Controller
{

    /**
     * Create a new ReportsCustomDocumentImageController instance.
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
        $this->authorize('viewAny', ReportsCustomDocumentImage::class);

        $reports_custom_document_images = ReportsCustomDocumentImage::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomDocumentImageCollection($reports_custom_document_images));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsCustomDocumentImageRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsCustomDocumentImageRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsCustomDocumentImage::class);

        $reports_custom_document_image = $request->fill(new ReportsCustomDocumentImage);
        if ($article_image = $request->file('article_image')) {
            $reports_custom_document_image->article_image = $article_image->store(config('storage.reports_custom_document_images.article_image'));
        }

        $reports_custom_document_image->save();
        $reports_custom_document_image->loadIncludes();

        return response()->resource(new ReportsCustomDocumentImageResource($reports_custom_document_image))
                ->message(__('crud.create', ['item' => __('model.ReportsCustomDocumentImage')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsCustomDocumentImageRequest  $request
     * @param  ReportsCustomDocumentImage $reports_custom_document_image
     * @return JsonResponse
     */
    public function update(UpdateReportsCustomDocumentImageRequest $request, ReportsCustomDocumentImage $reports_custom_document_image): JsonResponse
    {
        $this->authorize('update', $reports_custom_document_image);

        $request->fill($reports_custom_document_image);
        if ($article_image = $request->file('article_image')) {
            \Storage::delete($reports_custom_document_image->getOriginal('article_image'));
            $reports_custom_document_image->article_image = $article_image->store(config('storage.reports_custom_document_images.article_image'));
        }

        $reports_custom_document_image->update();
        $reports_custom_document_image->loadIncludes();

        return response()->resource(new ReportsCustomDocumentImageResource($reports_custom_document_image))
                ->message(__('crud.update', ['item' => __('model.ReportsCustomDocumentImage')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsCustomDocumentImage $reports_custom_document_image
     * @return JsonResponse
     */
    public function show(ReportsCustomDocumentImage $reports_custom_document_image): JsonResponse
    {
        $this->authorize('view', $reports_custom_document_image);

        $reports_custom_document_image->loadIncludes();

        return response()->resource(new ReportsCustomDocumentImageResource($reports_custom_document_image));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsCustomDocumentImage  $reports_custom_document_image
     * @return  JsonResponse
     */
    public function destroy(ReportsCustomDocumentImage $reports_custom_document_image): JsonResponse
    {
        $this->authorize('delete', $reports_custom_document_image);

        $reports_custom_document_image->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsCustomDocumentImage')]));
    }
}
