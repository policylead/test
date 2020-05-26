<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\SmsLink\SmsLinkResource;
use App\Http\Resources\SmsLink\SmsLinkCollection;
use App\Http\Requests\SmsLink\StoreSmsLinkRequest;
use App\Http\Requests\SmsLink\UpdateSmsLinkRequest;
use App\Models\SmsLink;

/**
 * @group SmsLink
 *
 * Endpoints for SmsLink entity
 */
class SmsLinkController extends Controller
{

    /**
     * Create a new SmsLinkController instance.
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
        $this->authorize('viewAny', SmsLink::class);

        $sms_links = SmsLink::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new SmsLinkCollection($sms_links));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreSmsLinkRequest  $request
     * @return JsonResponse
     */
    public function store(StoreSmsLinkRequest $request): JsonResponse
    {
        $this->authorize('create', SmsLink::class);

        $sms_link = $request->fill(new SmsLink);

        $sms_link->save();
        $sms_link->loadIncludes();

        return response()->resource(new SmsLinkResource($sms_link))
                ->message(__('crud.create', ['item' => __('model.SmsLink')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateSmsLinkRequest  $request
     * @param  SmsLink $sms_link
     * @return JsonResponse
     */
    public function update(UpdateSmsLinkRequest $request, SmsLink $sms_link): JsonResponse
    {
        $this->authorize('update', $sms_link);

        $request->fill($sms_link);
        
        $sms_link->update();
        $sms_link->loadIncludes();

        return response()->resource(new SmsLinkResource($sms_link))
                ->message(__('crud.update', ['item' => __('model.SmsLink')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  SmsLink $sms_link
     * @return JsonResponse
     */
    public function show(SmsLink $sms_link): JsonResponse
    {
        $this->authorize('view', $sms_link);

        $sms_link->loadIncludes();

        return response()->resource(new SmsLinkResource($sms_link));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  SmsLink  $sms_link
     * @return  JsonResponse
     */
    public function destroy(SmsLink $sms_link): JsonResponse
    {
        $this->authorize('delete', $sms_link);

        $sms_link->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.SmsLink')]));
    }
}
