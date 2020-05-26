<?php

namespace App\Http\Resources\TeamsList;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\ContentPartner\ContentPartnerCollection;
use App\Http\Resources\Dashboard\DashboardCollection;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\ReportsCustomDocument\ReportsCustomDocumentCollection;
use App\Http\Resources\ReportsCustomProvider\ReportsCustomProviderCollection;
use App\Http\Resources\ReportsMailingList\ReportsMailingListCollection;
use App\Http\Resources\ReportsVersion\ReportsVersionCollection;
use App\Http\Resources\Stakeholder\StakeholderCollection;

class TeamsListResource extends JsonResource
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
                'users' => new UserCollection($this->whenLoaded('users')),
                'bookmarks' => new BookmarkCollection($this->whenLoaded('bookmarks')),
                'contentPartners' => new ContentPartnerCollection($this->whenLoaded('contentPartners')),
                'dashboards' => new DashboardCollection($this->whenLoaded('dashboards')),
                'documentsComments' => new DocumentsCommentCollection($this->whenLoaded('documentsComments')),
                'reports' => new ReportCollection($this->whenLoaded('reports')),
                'reportsCustomDocuments' => new ReportsCustomDocumentCollection($this->whenLoaded('reportsCustomDocuments')),
                'reportsCustomProviders' => new ReportsCustomProviderCollection($this->whenLoaded('reportsCustomProviders')),
                'reportsMailingLists' => new ReportsMailingListCollection($this->whenLoaded('reportsMailingLists')),
                'reportsVersions' => new ReportsVersionCollection($this->whenLoaded('reportsVersions')),
                'stakeholders' => new StakeholderCollection($this->whenLoaded('stakeholders')),
            ]
        );
    }
}
