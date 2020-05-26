<?php

namespace App\Http\Resources\Report;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\TeamsList\TeamsListResource;
use App\Http\Resources\ReportTemplate\ReportTemplateResource;
use App\Http\Resources\ClientFeedReportAssociation\ClientFeedReportAssociationCollection;
use App\Http\Resources\ReportsEmailClick\ReportsEmailClickCollection;
use App\Http\Resources\ReportsScheduled\ReportsScheduledCollection;
use App\Http\Resources\ReportsVersion\ReportsVersionCollection;

class ReportResource extends JsonResource
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
                'user' => new UserResource($this->whenLoaded('user')),
                'author' => new AuthorResource($this->whenLoaded('author')),
                'team' => new TeamsListResource($this->whenLoaded('team')),
                'reportTemplate' => new ReportTemplateResource($this->whenLoaded('reportTemplate')),
                'clientFeedReportAssociations' => new ClientFeedReportAssociationCollection($this->whenLoaded('clientFeedReportAssociations')),
                'reportsEmailClicks' => new ReportsEmailClickCollection($this->whenLoaded('reportsEmailClicks')),
                'reportsScheduleds' => new ReportsScheduledCollection($this->whenLoaded('reportsScheduleds')),
                'reportsVersions' => new ReportsVersionCollection($this->whenLoaded('reportsVersions')),
            ]
        );
    }
}
