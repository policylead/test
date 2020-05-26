<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\NewsletterSubscription\NewsletterSubscriptionCollection;
use App\Http\Resources\ReportsScheduled\ReportsScheduledCollection;
use App\Http\Resources\ReportsMailingList\ReportsMailingListResource;
use App\Http\Resources\ReportsMailingList\ReportsMailingListCollection;
use App\Http\Requests\ReportsMailingList\StoreReportsMailingListRequest;
use App\Http\Requests\ReportsMailingList\UpdateReportsMailingListRequest;
use App\Models\ReportsMailingList;
use App\Models\NewsletterSubscription;
use App\Models\ReportsScheduled;

/**
 * @group ReportsMailingList
 *
 * Endpoints for ReportsMailingList entity
 */
class ReportsMailingListController extends Controller
{

    /**
     * Create a new ReportsMailingListController instance.
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
        $this->authorize('viewAny', ReportsMailingList::class);

        $reports_mailing_lists = ReportsMailingList::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsMailingListCollection($reports_mailing_lists));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportsMailingListRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportsMailingListRequest $request): JsonResponse
    {
        $this->authorize('create', ReportsMailingList::class);

        $reports_mailing_list = $request->fill(new ReportsMailingList);

        $reports_mailing_list->user_id = auth()->user()->id;

        $reports_mailing_list->save();
        $reports_mailing_list->loadIncludes();

        return response()->resource(new ReportsMailingListResource($reports_mailing_list))
                ->message(__('crud.create', ['item' => __('model.ReportsMailingList')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportsMailingListRequest  $request
     * @param  ReportsMailingList $reports_mailing_list
     * @return JsonResponse
     */
    public function update(UpdateReportsMailingListRequest $request, ReportsMailingList $reports_mailing_list): JsonResponse
    {
        $this->authorize('update', $reports_mailing_list);

        $request->fill($reports_mailing_list);
        
        $reports_mailing_list->update();
        $reports_mailing_list->loadIncludes();

        return response()->resource(new ReportsMailingListResource($reports_mailing_list))
                ->message(__('crud.update', ['item' => __('model.ReportsMailingList')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportsMailingList $reports_mailing_list
     * @return JsonResponse
     */
    public function show(ReportsMailingList $reports_mailing_list): JsonResponse
    {
        $this->authorize('view', $reports_mailing_list);

        $reports_mailing_list->loadIncludes();

        return response()->resource(new ReportsMailingListResource($reports_mailing_list));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportsMailingList  $reports_mailing_list
     * @return  JsonResponse
     */
    public function destroy(ReportsMailingList $reports_mailing_list): JsonResponse
    {
        $this->authorize('delete', $reports_mailing_list);

        $reports_mailing_list->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportsMailingList')]));
    }

    /**
     * Search NewsletterSubscriptions for ReportsMailingList with given $id
     *
     * NewsletterSubscriptions from existing resource.
     *
     * @param Request $request
     * @param ReportsMailingList $reports_mailing_list
     * @return JsonResponse
     */
    public function searchNewsletterSubscriptions(Request $request, ReportsMailingList $reports_mailing_list): JsonResponse
    {
        $this->authorize('searchNewsletterSubscriptions', $reports_mailing_list);

        $newsletterSubscriptions = $reports_mailing_list->newsletterSubscriptions()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new NewsletterSubscriptionCollection($newsletterSubscriptions));
    }

    /**
     * Search ReportsScheduleds for ReportsMailingList with given $id
     *
     * ReportsScheduleds from existing resource.
     *
     * @param Request $request
     * @param ReportsMailingList $reports_mailing_list
     * @return JsonResponse
     */
    public function searchReportsScheduleds(Request $request, ReportsMailingList $reports_mailing_list): JsonResponse
    {
        $this->authorize('searchReportsScheduleds', $reports_mailing_list);

        $reportsScheduleds = $reports_mailing_list->reportsScheduleds()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsScheduledCollection($reportsScheduleds));
    }
}
