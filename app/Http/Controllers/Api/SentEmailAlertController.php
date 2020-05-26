<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\TaggingTagged\TaggingTaggedCollection;
use App\Http\Resources\SentEmailAlert\SentEmailAlertResource;
use App\Http\Resources\SentEmailAlert\SentEmailAlertCollection;
use App\Http\Requests\SentEmailAlert\StoreSentEmailAlertRequest;
use App\Http\Requests\SentEmailAlert\UpdateSentEmailAlertRequest;
use App\Models\SentEmailAlert;
use App\Models\TaggingTagged;

/**
 * @group SentEmailAlert
 *
 * Endpoints for SentEmailAlert entity
 */
class SentEmailAlertController extends Controller
{

    /**
     * Create a new SentEmailAlertController instance.
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
        $this->authorize('viewAny', SentEmailAlert::class);

        $sent_email_alerts = SentEmailAlert::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new SentEmailAlertCollection($sent_email_alerts));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreSentEmailAlertRequest  $request
     * @return JsonResponse
     */
    public function store(StoreSentEmailAlertRequest $request): JsonResponse
    {
        $this->authorize('create', SentEmailAlert::class);

        $sent_email_alert = $request->fill(new SentEmailAlert);

        $sent_email_alert->save();
        $sent_email_alert->loadIncludes();

        return response()->resource(new SentEmailAlertResource($sent_email_alert))
                ->message(__('crud.create', ['item' => __('model.SentEmailAlert')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateSentEmailAlertRequest  $request
     * @param  SentEmailAlert $sent_email_alert
     * @return JsonResponse
     */
    public function update(UpdateSentEmailAlertRequest $request, SentEmailAlert $sent_email_alert): JsonResponse
    {
        $this->authorize('update', $sent_email_alert);

        $request->fill($sent_email_alert);
        
        $sent_email_alert->update();
        $sent_email_alert->loadIncludes();

        return response()->resource(new SentEmailAlertResource($sent_email_alert))
                ->message(__('crud.update', ['item' => __('model.SentEmailAlert')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  SentEmailAlert $sent_email_alert
     * @return JsonResponse
     */
    public function show(SentEmailAlert $sent_email_alert): JsonResponse
    {
        $this->authorize('view', $sent_email_alert);

        $sent_email_alert->loadIncludes();

        return response()->resource(new SentEmailAlertResource($sent_email_alert));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  SentEmailAlert  $sent_email_alert
     * @return  JsonResponse
     */
    public function destroy(SentEmailAlert $sent_email_alert): JsonResponse
    {
        $this->authorize('delete', $sent_email_alert);

        $sent_email_alert->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.SentEmailAlert')]));
    }

    /**
     * Search TaggingTaggeds for SentEmailAlert with given $id
     *
     * TaggingTaggeds from existing resource.
     *
     * @param Request $request
     * @param SentEmailAlert $sent_email_alert
     * @return JsonResponse
     */
    public function searchTaggingTaggeds(Request $request, SentEmailAlert $sent_email_alert): JsonResponse
    {
        $this->authorize('searchTaggingTaggeds', $sent_email_alert);

        $taggingTaggeds = $sent_email_alert->taggingTaggeds()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new TaggingTaggedCollection($taggingTaggeds));
    }
}
