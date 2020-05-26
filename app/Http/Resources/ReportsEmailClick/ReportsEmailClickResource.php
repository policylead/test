<?php

namespace App\Http\Resources\ReportsEmailClick;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Report\ReportResource;

class ReportsEmailClickResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  array_merge(
            parent::toArray($request),
            [
                /**
                 * Resources that can be included if requested.
                 */
                'report' => new ReportResource($this->whenLoaded('report')),
            ]
        );
    }
}
