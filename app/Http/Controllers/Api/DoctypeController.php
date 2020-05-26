<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use App\Http\Resources\Doctype\DoctypeResource;
use App\Http\Resources\Doctype\DoctypeCollection;
use App\Http\Requests\Doctype\StoreDoctypeRequest;
use App\Http\Requests\Doctype\UpdateDoctypeRequest;
use App\Models\Doctype;

/**
 * @group Doctype
 *
 * Endpoints for Doctype entity
 */
class DoctypeController extends Controller
{

    /**
     * Create a new DoctypeController instance.
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
        $this->authorize('viewAny', Doctype::class);

        $doctypes = Doctype::search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DoctypeCollection($doctypes));
    }

    /**
     * Create item
     *
     * Store a newly created item in storage.
     *
     * @param  StoreDoctypeRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDoctypeRequest $request): JsonResponse
    {
        $this->authorize('create', Doctype::class);

        $doctype = $request->fill(new Doctype);

        $doctype->save();
        $doctype->loadIncludes();

        return response()->resource(new DoctypeResource($doctype))
                ->message(__('crud.create', ['item' => __('model.Doctype')]));
    }

    /**
     * Update item
     *
     * Update the specified item in storage.
     *
     * @param  UpdateDoctypeRequest  $request
     * @param  Doctype $doctype
     * @return JsonResponse
     */
    public function update(UpdateDoctypeRequest $request, Doctype $doctype): JsonResponse
    {
        $this->authorize('update', $doctype);

        $request->fill($doctype);
        
        $doctype->update();
        $doctype->loadIncludes();

        return response()->resource(new DoctypeResource($doctype))
                ->message(__('crud.update', ['item' => __('model.Doctype')]));
    }
    /**
     * Get Single Item
     *
     * Display the specified item.
     *
     * @param  Doctype $doctype
     * @return JsonResponse
     */
    public function show(Doctype $doctype): JsonResponse
    {
        $this->authorize('view', $doctype);

        $doctype->loadIncludes();

        return response()->resource(new DoctypeResource($doctype));
    }

    /**
     * Remove item
     *
     * Remove the specified item from storage.
     *

     * @param  Doctype  $doctype
     * @return  JsonResponse
     */
    public function destroy(Doctype $doctype): JsonResponse
    {
        $this->authorize('delete', $doctype);

        $doctype->delete();

        return response()
                ->success(__('crud.delete', ['item' => __('model.Doctype')]));
    }
}
