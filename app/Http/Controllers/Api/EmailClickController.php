<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\EmailClick\EmailClickResource;
use App\Http\Resources\EmailClick\EmailClickCollection;
use App\Http\Requests\EmailClick\StoreEmailClickRequest;
use App\Http\Requests\EmailClick\UpdateEmailClickRequest;
use App\Models\EmailClick;

/**
 * @group EmailClick
 *
 * Endpoints for EmailClick entity
 */
class EmailClickController extends Controller
{

    /**
     * Create a new EmailClickController instance.
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
        $this->authorize('viewAny', EmailClick::class);

        $email_clicks = EmailClick::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new EmailClickCollection($email_clicks));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreEmailClickRequest  $request
     * @return JsonResponse
     */
    public function store(StoreEmailClickRequest $request): JsonResponse
    {
        $this->authorize('create', EmailClick::class);

        $email_click = $request->fill(new EmailClick);

        $email_click->user_id = auth()->user()->id;

        $email_click->save();
        $email_click->loadIncludes();

        return response()->resource(new EmailClickResource($email_click))
                ->message(__('crud.create', ['item' => __('model.EmailClick')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateEmailClickRequest  $request
     * @param  EmailClick $email_click
     * @return JsonResponse
     */
    public function update(UpdateEmailClickRequest $request, EmailClick $email_click): JsonResponse
    {
        $this->authorize('update', $email_click);

        $request->fill($email_click);
        
        $email_click->update();
        $email_click->loadIncludes();

        return response()->resource(new EmailClickResource($email_click))
                ->message(__('crud.update', ['item' => __('model.EmailClick')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  EmailClick $email_click
     * @return JsonResponse
     */
    public function show(EmailClick $email_click): JsonResponse
    {
        $this->authorize('view', $email_click);

        $email_click->loadIncludes();

        return response()->resource(new EmailClickResource($email_click));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  EmailClick  $email_click
     * @return  JsonResponse
     */
    public function destroy(EmailClick $email_click): JsonResponse
    {
        $this->authorize('delete', $email_click);

        $email_click->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.EmailClick')]));
    }
}
