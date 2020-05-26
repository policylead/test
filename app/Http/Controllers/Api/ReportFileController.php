<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\ReportFile\ReportFileResource;
use App\Http\Resources\ReportFile\ReportFileCollection;
use App\Http\Requests\ReportFile\StoreReportFileRequest;
use App\Http\Requests\ReportFile\UpdateReportFileRequest;
use App\Models\ReportFile;

/**
 * @group ReportFile
 *
 * Endpoints for ReportFile entity
 */
class ReportFileController extends Controller
{

    /**
     * Create a new ReportFileController instance.
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
        $this->authorize('viewAny', ReportFile::class);

        $report_files = ReportFile::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportFileCollection($report_files));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreReportFileRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReportFileRequest $request): JsonResponse
    {
        $this->authorize('create', ReportFile::class);

        $report_file = $request->fill(new ReportFile);

        $report_file->user_id = auth()->user()->id;

        $report_file->save();
        $report_file->loadIncludes();

        return response()->resource(new ReportFileResource($report_file))
                ->message(__('crud.create', ['item' => __('model.ReportFile')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateReportFileRequest  $request
     * @param  ReportFile $report_file
     * @return JsonResponse
     */
    public function update(UpdateReportFileRequest $request, ReportFile $report_file): JsonResponse
    {
        $this->authorize('update', $report_file);

        $request->fill($report_file);
        
        $report_file->update();
        $report_file->loadIncludes();

        return response()->resource(new ReportFileResource($report_file))
                ->message(__('crud.update', ['item' => __('model.ReportFile')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  ReportFile $report_file
     * @return JsonResponse
     */
    public function show(ReportFile $report_file): JsonResponse
    {
        $this->authorize('view', $report_file);

        $report_file->loadIncludes();

        return response()->resource(new ReportFileResource($report_file));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  ReportFile  $report_file
     * @return  JsonResponse
     */
    public function destroy(ReportFile $report_file): JsonResponse
    {
        $this->authorize('delete', $report_file);

        $report_file->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.ReportFile')]));
    }
}
