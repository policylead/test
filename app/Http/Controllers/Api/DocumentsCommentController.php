<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\DocumentsComment\DocumentsCommentResource;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Requests\DocumentsComment\StoreDocumentsCommentRequest;
use App\Http\Requests\DocumentsComment\UpdateDocumentsCommentRequest;
use App\Models\DocumentsComment;

/**
 * @group DocumentsComment
 *
 * Endpoints for DocumentsComment entity
 */
class DocumentsCommentController extends Controller
{

    /**
     * Create a new DocumentsCommentController instance.
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
        $this->authorize('viewAny', DocumentsComment::class);

        $documents_comments = DocumentsComment::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentsCommentCollection($documents_comments));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDocumentsCommentRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDocumentsCommentRequest $request): JsonResponse
    {
        $this->authorize('create', DocumentsComment::class);

        $documents_comment = $request->fill(new DocumentsComment);

        $documents_comment->user_id = auth()->user()->id;

        $documents_comment->save();
        $documents_comment->loadIncludes();

        return response()->resource(new DocumentsCommentResource($documents_comment))
                ->message(__('crud.create', ['item' => __('model.DocumentsComment')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDocumentsCommentRequest  $request
     * @param  DocumentsComment $documents_comment
     * @return JsonResponse
     */
    public function update(UpdateDocumentsCommentRequest $request, DocumentsComment $documents_comment): JsonResponse
    {
        $this->authorize('update', $documents_comment);

        $request->fill($documents_comment);
        
        $documents_comment->update();
        $documents_comment->loadIncludes();

        return response()->resource(new DocumentsCommentResource($documents_comment))
                ->message(__('crud.update', ['item' => __('model.DocumentsComment')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  DocumentsComment $documents_comment
     * @return JsonResponse
     */
    public function show(DocumentsComment $documents_comment): JsonResponse
    {
        $this->authorize('view', $documents_comment);

        $documents_comment->loadIncludes();

        return response()->resource(new DocumentsCommentResource($documents_comment));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  DocumentsComment  $documents_comment
     * @return  JsonResponse
     */
    public function destroy(DocumentsComment $documents_comment): JsonResponse
    {
        $this->authorize('delete', $documents_comment);

        $documents_comment->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.DocumentsComment')]));
    }
}
