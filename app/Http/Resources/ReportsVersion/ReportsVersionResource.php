<?php

namespace App\Http\Resources\ReportsVersion;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Report\ReportResource;
use App\Http\Resources\TeamsList\TeamsListResource;

class ReportsVersionResource extends JsonResource
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
                'team' => new TeamsListResource($this->whenLoaded('team')),
            ]
        );
    }
}
