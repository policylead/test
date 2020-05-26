<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Author\AuthorCollection;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\DocumentCount\DocumentCountCollection;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Resources\ReportsCustomDocumentImage\ReportsCustomDocumentImageCollection;
use App\Http\Resources\Document\DocumentResource;
use App\Http\Resources\Document\DocumentCollection;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Http\Requests\Document\UpdateDocumentRequest;
use App\Http\Requests\Document\DocumentAttachAuthorRequest;
use App\Http\Requests\Author\AuthorAttachAuthorDocumentRequest;
use App\Models\Document;
use App\Models\Author;
use App\Models\Bookmark;
use App\Models\DocumentCount;
use App\Models\DocumentsComment;
use App\Models\ReportsCustomDocumentImage;

/**
 * @group Document
 *
 * Endpoints for Document entity
 */
class DocumentController extends Controller
{

    /**
     * Create a new DocumentController instance.
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
        $this->authorize('viewAny', Document::class);

        $documents = Document::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCollection($documents));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDocumentRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDocumentRequest $request): JsonResponse
    {
        $this->authorize('create', Document::class);

        $document = $request->fill(new Document);

        $document->save();
        $document->loadIncludes();

        return response()->resource(new DocumentResource($document))
                ->message(__('crud.create', ['item' => __('model.Document')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDocumentRequest  $request
     * @param  Document $document
     * @return JsonResponse
     */
    public function update(UpdateDocumentRequest $request, Document $document): JsonResponse
    {
        $this->authorize('update', $document);

        $request->fill($document);
        
        $document->update();
        $document->loadIncludes();

        return response()->resource(new DocumentResource($document))
                ->message(__('crud.update', ['item' => __('model.Document')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Document $document
     * @return JsonResponse
     */
    public function show(Document $document): JsonResponse
    {
        $this->authorize('view', $document);

        $document->loadIncludes();

        return response()->resource(new DocumentResource($document));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Document  $document
     * @return  JsonResponse
     */
    public function destroy(Document $document): JsonResponse
    {
        $this->authorize('delete', $document);

        $document->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Document')]));
    }

    /**
     * Search Authors for Document with given $id
     *
     * Authors from existing resource.
     *
     * @param Request $request
     * @param Document $document
     * @return JsonResponse
     */
    public function searchAuthors(Request $request, Document $document): JsonResponse
    {
        $this->authorize('searchAuthors', $document);

        $authors = $document->authors()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new AuthorCollection($authors));
    }

    /**
     * Search Bookmarks for Document with given $id
     *
     * Bookmarks from existing resource.
     *
     * @param Request $request
     * @param Document $document
     * @return JsonResponse
     */
    public function searchBookmarks(Request $request, Document $document): JsonResponse
    {
        $this->authorize('searchBookmarks', $document);

        $bookmarks = $document->bookmarks()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BookmarkCollection($bookmarks));
    }

    /**
     * Search DocumentCounts for Document with given $id
     *
     * DocumentCounts from existing resource.
     *
     * @param Request $request
     * @param Document $document
     * @return JsonResponse
     */
    public function searchDocumentCounts(Request $request, Document $document): JsonResponse
    {
        $this->authorize('searchDocumentCounts', $document);

        $documentCounts = $document->documentCounts()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCountCollection($documentCounts));
    }

    /**
     * Search DocumentsComments for Document with given $id
     *
     * DocumentsComments from existing resource.
     *
     * @param Request $request
     * @param Document $document
     * @return JsonResponse
     */
    public function searchDocumentsComments(Request $request, Document $document): JsonResponse
    {
        $this->authorize('searchDocumentsComments', $document);

        $documentsComments = $document->documentsComments()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentsCommentCollection($documentsComments));
    }

    /**
     * Search ReportsCustomDocumentImages for Document with given $id
     *
     * ReportsCustomDocumentImages from existing resource.
     *
     * @param Request $request
     * @param Document $document
     * @return JsonResponse
     */
    public function searchReportsCustomDocumentImages(Request $request, Document $document): JsonResponse
    {
        $this->authorize('searchReportsCustomDocumentImages', $document);

        $reportsCustomDocumentImages = $document->reportsCustomDocumentImages()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomDocumentImageCollection($reportsCustomDocumentImages));
    }

    /**
     * Search Persons for Document with given $id
     *
     * Persons from existing resource.
     *
     * @param Request $request
     * @param Document $document
     * @return JsonResponse
     */
    public function searchPersons(Request $request, Document $document): JsonResponse
    {
        $this->authorize('searchPersons', $document);

        $persons = $document->persons()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new AuthorCollection($persons));
    }

    /**
     * Attach Author
     *
     * Attach the Author to existing resource.
     *
     * @param  DocumentAttachAuthorRequest  $request
     * @param  Document  $document
     * @param  Author  $author
     * @return JsonResponse
     */
    public function attachAuthor(DocumentAttachAuthorRequest $request, Document $document, Author $author): JsonResponse
    {
        $this->authorize('attachAuthor', [$document, $author]);

        $data = $request->only(array_keys($request->rules()));
        $document->authors()->attach($author, $data);
        $document->loadIncludes();
        return response()->resource(new DocumentResource($document))
                ->setStatusCode(201)
                ->message(__('crud.attach', ['item' => __('model.Author')]));
    }

    /**
     * Attach Person
     *
     * Attach the Person to existing resource.
     *
     * @param  AuthorAttachAuthorDocumentRequest  $request
     * @param  Document  $document
     * @param  Author  $author
     * @return JsonResponse
     */
    public function attachPerson(AuthorAttachAuthorDocumentRequest $request, Document $document, Author $author): JsonResponse
    {
        $this->authorize('attachPerson', [$document, $author]);

        $data = $request->only(array_keys($request->rules()));
        $document->persons()->attach($author, $data);
        $document->loadIncludes();
        return response()->resource(new DocumentResource($document))
                ->setStatusCode(201)
                ->message(__('crud.attach', ['item' => __('model.Author')]));
    }

    /**
     * Detach Author
     *
     * Detach the Author from existing resource.
     *

     * @param  Document  $document
     * @param  Author  $author
     * @return JsonResponse
     */
    public function detachAuthor(Document $document, Author $author): JsonResponse
    {
        $this->authorize('detachAuthor', [$document, $author]);

        $document->authors()->detach($author);

        return response()
                ->success(__('crud.detach', ['item' => __('model.Author')]));
    }

    /**
     * Detach Person
     *
     * Detach the Person from existing resource.
     *

     * @param  Document  $document
     * @param  Author  $author
     * @return JsonResponse
     */
    public function detachPerson(Document $document, Author $author): JsonResponse
    {
        $this->authorize('detachPerson', [$document, $author]);

        $document->persons()->detach($author);

        return response()
                ->success(__('crud.detach', ['item' => __('model.Author')]));
    }
}
