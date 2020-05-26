<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ClientFeedReportAssociation\ClientFeedReportAssociationCollection;
use App\Http\Resources\ReportsEmailClick\ReportsEmailClickCollection;
use App\Http\Resources\ReportsScheduled\ReportsScheduledCollection;
use App\Http\Resources\ReportsVersion\ReportsVersionCollection;
use App\Http\Resources\Report\ReportResource;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Requests\Report\StoreReportRequest;
use App\Http\Requests\Report\UpdateReportRequest;
use App\Models\Report;
use App\Models\ClientFeedReportAssociation;
use App\Models\ReportsEmailClick;
use App\Models\ReportsScheduled;
use App\Models\ReportsVersion;

/**
 * @group Report
 *
 * Endpoints for Report entity
 */
class ReportController extends Controller
{

    /**
     * Create a new ReportController instance.
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
        $this->authorize('viewAny', Report::class);

        $reports = Report::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportCollection($reports));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportRequest $request): JsonResponse
    {
        $this->authorize('create', Report::class);

        $report = $request->fill(new Report);

        $report->user_id = auth()->user()->id;

        $report->save();
        $report->loadIncludes();

        return response()->resource(new ReportResource($report))
                ->message(__('crud.create', ['item' => __('model.Report')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportRequest  $request
     * @param  Report $report
     * @return JsonResponse
     */
    public function update(UpdateReportRequest $request, Report $report): JsonResponse
    {
        $this->authorize('update', $report);

        $request->fill($report);
        
        $report->update();
        $report->loadIncludes();

        return response()->resource(new ReportResource($report))
                ->message(__('crud.update', ['item' => __('model.Report')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Report $report
     * @return JsonResponse
     */
    public function show(Report $report): JsonResponse
    {
        $this->authorize('view', $report);

        $report->loadIncludes();

        return response()->resource(new ReportResource($report));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Report  $report
     * @return  JsonResponse
     */
    public function destroy(Report $report): JsonResponse
    {
        $this->authorize('delete', $report);

        $report->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Report')]));
    }

    /**
     * Search ClientFeedReportAssociations for Report with given $id
     *
     * ClientFeedReportAssociations from existing resource.
     *
     * @param Request $request
     * @param Report $report
     * @return JsonResponse
     */
    public function searchClientFeedReportAssociations(Request $request, Report $report): JsonResponse
    {
        $this->authorize('searchClientFeedReportAssociations', $report);

        $clientFeedReportAssociations = $report->clientFeedReportAssociations()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ClientFeedReportAssociationCollection($clientFeedReportAssociations));
    }

    /**
     * Search ReportsEmailClicks for Report with given $id
     *
     * ReportsEmailClicks from existing resource.
     *
     * @param Request $request
     * @param Report $report
     * @return JsonResponse
     */
    public function searchReportsEmailClicks(Request $request, Report $report): JsonResponse
    {
        $this->authorize('searchReportsEmailClicks', $report);

        $reportsEmailClicks = $report->reportsEmailClicks()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsEmailClickCollection($reportsEmailClicks));
    }

    /**
     * Search ReportsScheduleds for Report with given $id
     *
     * ReportsScheduleds from existing resource.
     *
     * @param Request $request
     * @param Report $report
     * @return JsonResponse
     */
    public function searchReportsScheduleds(Request $request, Report $report): JsonResponse
    {
        $this->authorize('searchReportsScheduleds', $report);

        $reportsScheduleds = $report->reportsScheduleds()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsScheduledCollection($reportsScheduleds));
    }

    /**
     * Search ReportsVersions for Report with given $id
     *
     * ReportsVersions from existing resource.
     *
     * @param Request $request
     * @param Report $report
     * @return JsonResponse
     */
    public function searchReportsVersions(Request $request, Report $report): JsonResponse
    {
        $this->authorize('searchReportsVersions', $report);

        $reportsVersions = $report->reportsVersions()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsVersionCollection($reportsVersions));
    }
}
