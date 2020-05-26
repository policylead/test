<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ContentPartner\ContentPartnerResource;
use App\Http\Resources\ContentPartner\ContentPartnerCollection;
use App\Http\Requests\ContentPartner\StoreContentPartnerRequest;
use App\Http\Requests\ContentPartner\UpdateContentPartnerRequest;
use App\Models\ContentPartner;

/**
 * @group ContentPartner
 *
 * Endpoints for ContentPartner entity
 */
class ContentPartnerController extends Controller
{

    /**
     * Create a new ContentPartnerController instance.
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
        $this->authorize('viewAny', ContentPartner::class);

        $content_partners = ContentPartner::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ContentPartnerCollection($content_partners));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreContentPartnerRequest  $request
     * @return JsonResponse
     */
    public function store(StoreContentPartnerRequest $request): JsonResponse
    {
        $this->authorize('create', ContentPartner::class);

        $content_partner = $request->fill(new ContentPartner);

        $content_partner->user_id = auth()->user()->id;

        $content_partner->save();
        $content_partner->loadIncludes();

        return response()->resource(new ContentPartnerResource($content_partner))
                ->message(__('crud.create', ['item' => __('model.ContentPartner')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateContentPartnerRequest  $request
     * @param  ContentPartner $content_partner
     * @return JsonResponse
     */
    public function update(UpdateContentPartnerRequest $request, ContentPartner $content_partner): JsonResponse
    {
        $this->authorize('update', $content_partner);

        $request->fill($content_partner);
        
        $content_partner->update();
        $content_partner->loadIncludes();

        return response()->resource(new ContentPartnerResource($content_partner))
                ->message(__('crud.update', ['item' => __('model.ContentPartner')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ContentPartner $content_partner
     * @return JsonResponse
     */
    public function show(ContentPartner $content_partner): JsonResponse
    {
        $this->authorize('view', $content_partner);

        $content_partner->loadIncludes();

        return response()->resource(new ContentPartnerResource($content_partner));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ContentPartner  $content_partner
     * @return  JsonResponse
     */
    public function destroy(ContentPartner $content_partner): JsonResponse
    {
        $this->authorize('delete', $content_partner);

        $content_partner->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ContentPartner')]));
    }
}
