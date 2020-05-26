<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Document\DocumentCollection;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\StakeholdersList\StakeholdersListCollection;
use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\Author\AuthorCollection;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Requests\Author\AuthorAttachAuthorDocumentRequest;
use App\Http\Requests\Document\DocumentAttachAuthorRequest;
use App\Models\Author;
use App\Models\Document;
use App\Models\Report;
use App\Models\StakeholdersList;

/**
 * @group Author
 *
 * Endpoints for Author entity
 */
class AuthorController extends Controller
{

    /**
     * Create a new AuthorController instance.
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
        $this->authorize('viewAny', Author::class);

        $authors = Author::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new AuthorCollection($authors));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreAuthorRequest  $request
     * @return JsonResponse
     */
    public function store(StoreAuthorRequest $request): JsonResponse
    {
        $this->authorize('create', Author::class);

        $author = $request->fill(new Author);

        $author->save();
        $author->loadIncludes();

        return response()->resource(new AuthorResource($author))
                ->message(__('crud.create', ['item' => __('model.Author')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateAuthorRequest  $request
     * @param  Author $author
     * @return JsonResponse
     */
    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
        $this->authorize('update', $author);

        $request->fill($author);
        
        $author->update();
        $author->loadIncludes();

        return response()->resource(new AuthorResource($author))
                ->message(__('crud.update', ['item' => __('model.Author')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Author $author
     * @return JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        $this->authorize('view', $author);

        $author->loadIncludes();

        return response()->resource(new AuthorResource($author));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Author  $author
     * @return  JsonResponse
     */
    public function destroy(Author $author): JsonResponse
    {
        $this->authorize('delete', $author);

        $author->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Author')]));
    }

    /**
     * Search AuthorDocuments for Author with given $id
     *
     * AuthorDocuments from existing resource.
     *
     * @param Request $request
     * @param Author $author
     * @return JsonResponse
     */
    public function searchAuthorDocuments(Request $request, Author $author): JsonResponse
    {
        $this->authorize('searchAuthorDocuments', $author);

        $authorDocuments = $author->authorDocuments()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCollection($authorDocuments));
    }

    /**
     * Search Reports for Author with given $id
     *
     * Reports from existing resource.
     *
     * @param Request $request
     * @param Author $author
     * @return JsonResponse
     */
    public function searchReports(Request $request, Author $author): JsonResponse
    {
        $this->authorize('searchReports', $author);

        $reports = $author->reports()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportCollection($reports));
    }

    /**
     * Search StakeholdersLists for Author with given $id
     *
     * StakeholdersLists from existing resource.
     *
     * @param Request $request
     * @param Author $author
     * @return JsonResponse
     */
    public function searchStakeholdersLists(Request $request, Author $author): JsonResponse
    {
        $this->authorize('searchStakeholdersLists', $author);

        $stakeholdersLists = $author->stakeholdersLists()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholdersListCollection($stakeholdersLists));
    }

    /**
     * Search PersonDocuments for Author with given $id
     *
     * PersonDocuments from existing resource.
     *
     * @param Request $request
     * @param Author $author
     * @return JsonResponse
     */
    public function searchPersonDocuments(Request $request, Author $author): JsonResponse
    {
        $this->authorize('searchPersonDocuments', $author);

        $personDocuments = $author->personDocuments()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCollection($personDocuments));
    }

    /**
     * Attach AuthorDocument
     *
     * Attach the AuthorDocument to existing resource.
     *
     * @param  AuthorAttachAuthorDocumentRequest  $request
     * @param  Author  $author
     * @param  Document  $document
     * @return JsonResponse
     */
    public function attachAuthorDocument(AuthorAttachAuthorDocumentRequest $request, Author $author, Document $document): JsonResponse
    {
        $this->authorize('attachAuthorDocument', [$author, $document]);

        $data = $request->only(array_keys($request->rules()));
        $author->authorDocuments()->attach($document, $data);
        $author->loadIncludes();
        return response()->resource(new AuthorResource($author))
                ->setStatusCode(201)
                ->message(__('crud.attach', ['item' => __('model.Document')]));
    }

    /**
     * Attach PersonDocument
     *
     * Attach the PersonDocument to existing resource.
     *
     * @param  DocumentAttachAuthorRequest  $request
     * @param  Author  $author
     * @param  Document  $document
     * @return JsonResponse
     */
    public function attachPersonDocument(DocumentAttachAuthorRequest $request, Author $author, Document $document): JsonResponse
    {
        $this->authorize('attachPersonDocument', [$author, $document]);

        $data = $request->only(array_keys($request->rules()));
        $author->personDocuments()->attach($document, $data);
        $author->loadIncludes();
        return response()->resource(new AuthorResource($author))
                ->setStatusCode(201)
                ->message(__('crud.attach', ['item' => __('model.Document')]));
    }

    /**
     * Detach AuthorDocument
     *
     * Detach the AuthorDocument from existing resource.
     *

     * @param  Author  $author
     * @param  Document  $document
     * @return JsonResponse
     */
    public function detachAuthorDocument(Author $author, Document $document): JsonResponse
    {
        $this->authorize('detachAuthorDocument', [$author, $document]);

        $author->authorDocuments()->detach($document);

        return response()
                ->success(__('crud.detach', ['item' => __('model.Document')]));
    }

    /**
     * Detach PersonDocument
     *
     * Detach the PersonDocument from existing resource.
     *

     * @param  Author  $author
     * @param  Document  $document
     * @return JsonResponse
     */
    public function detachPersonDocument(Author $author, Document $document): JsonResponse
    {
        $this->authorize('detachPersonDocument', [$author, $document]);

        $author->personDocuments()->detach($document);

        return response()
                ->success(__('crud.detach', ['item' => __('model.Document')]));
    }
}
