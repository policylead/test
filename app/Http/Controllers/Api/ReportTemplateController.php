<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\NewsletterSubscription\NewsletterSubscriptionCollection;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\ReportTemplate\ReportTemplateResource;
use App\Http\Resources\ReportTemplate\ReportTemplateCollection;
use App\Http\Requests\ReportTemplate\StoreReportTemplateRequest;
use App\Http\Requests\ReportTemplate\UpdateReportTemplateRequest;
use App\Models\ReportTemplate;
use App\Models\NewsletterSubscription;
use App\Models\Report;

/**
 * @group ReportTemplate
 *
 * Endpoints for ReportTemplate entity
 */
class ReportTemplateController extends Controller
{

    /**
     * Create a new ReportTemplateController instance.
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
        $this->authorize('viewAny', ReportTemplate::class);

        $report_templates = ReportTemplate::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportTemplateCollection($report_templates));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportTemplateRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportTemplateRequest $request): JsonResponse
    {
        $this->authorize('create', ReportTemplate::class);

        $report_template = $request->fill(new ReportTemplate);
        if ($logo = $request->file('logo')) {
            $report_template->logo = $logo->store(config('storage.report_templates.logo'));
        }

        $report_template->save();
        $report_template->loadIncludes();

        return response()->resource(new ReportTemplateResource($report_template))
                ->message(__('crud.create', ['item' => __('model.ReportTemplate')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportTemplateRequest  $request
     * @param  ReportTemplate $report_template
     * @return JsonResponse
     */
    public function update(UpdateReportTemplateRequest $request, ReportTemplate $report_template): JsonResponse
    {
        $this->authorize('update', $report_template);

        $request->fill($report_template);
        if ($logo = $request->file('logo')) {
            \Storage::delete($report_template->getOriginal('logo'));
            $report_template->logo = $logo->store(config('storage.report_templates.logo'));
        }

        $report_template->update();
        $report_template->loadIncludes();

        return response()->resource(new ReportTemplateResource($report_template))
                ->message(__('crud.update', ['item' => __('model.ReportTemplate')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportTemplate $report_template
     * @return JsonResponse
     */
    public function show(ReportTemplate $report_template): JsonResponse
    {
        $this->authorize('view', $report_template);

        $report_template->loadIncludes();

        return response()->resource(new ReportTemplateResource($report_template));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportTemplate  $report_template
     * @return  JsonResponse
     */
    public function destroy(ReportTemplate $report_template): JsonResponse
    {
        $this->authorize('delete', $report_template);

        $report_template->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportTemplate')]));
    }

    /**
     * Search NewsletterSubscriptions for ReportTemplate with given $id
     *
     * NewsletterSubscriptions from existing resource.
     *
     * @param Request $request
     * @param ReportTemplate $report_template
     * @return JsonResponse
     */
    public function searchNewsletterSubscriptions(Request $request, ReportTemplate $report_template): JsonResponse
    {
        $this->authorize('searchNewsletterSubscriptions', $report_template);

        $newsletterSubscriptions = $report_template->newsletterSubscriptions()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new NewsletterSubscriptionCollection($newsletterSubscriptions));
    }

    /**
     * Search Reports for ReportTemplate with given $id
     *
     * Reports from existing resource.
     *
     * @param Request $request
     * @param ReportTemplate $report_template
     * @return JsonResponse
     */
    public function searchReports(Request $request, ReportTemplate $report_template): JsonResponse
    {
        $this->authorize('searchReports', $report_template);

        $reports = $report_template->reports()
            ->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportCollection($reports));
    }
}
