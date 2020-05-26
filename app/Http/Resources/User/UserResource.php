<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TeamsList\TeamsListResource;
use App\Http\Resources\Alert\AlertCollection;
use App\Http\Resources\Billing\BillingCollection;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\ClientFeed\ClientFeedCollection;
use App\Http\Resources\ContentPartner\ContentPartnerCollection;
use App\Http\Resources\Dashboard\DashboardCollection;
use App\Http\Resources\DashboardsSetting\DashboardsSettingCollection;
use App\Http\Resources\DocumentCount\DocumentCountCollection;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Resources\EmailClick\EmailClickCollection;
use App\Http\Resources\EventEmailClick\EventEmailClickCollection;
use App\Http\Resources\ReportFile\ReportFileCollection;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\ReportsCustomDocument\ReportsCustomDocumentCollection;
use App\Http\Resources\ReportsCustomProvider\ReportsCustomProviderCollection;
use App\Http\Resources\ReportsMailingList\ReportsMailingListCollection;
use App\Http\Resources\Revision\RevisionCollection;
use App\Http\Resources\SentEventAlert\SentEventAlertCollection;
use App\Http\Resources\Stakeholder\StakeholderCollection;
use App\Http\Resources\UserDocRequest\UserDocRequestCollection;
use App\Http\Resources\UserLimit\UserLimitCollection;
use App\Http\Resources\Interest\InterestCollection;

class UserResource extends JsonResource
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
                'team' => new TeamsListResource($this->whenLoaded('team')),
                'alerts' => new AlertCollection($this->whenLoaded('alerts')),
                'billings' => new BillingCollection($this->whenLoaded('billings')),
                'bookmarks' => new BookmarkCollection($this->whenLoaded('bookmarks')),
                'clientFeeds' => new ClientFeedCollection($this->whenLoaded('clientFeeds')),
                'contentPartners' => new ContentPartnerCollection($this->whenLoaded('contentPartners')),
                'dashboards' => new DashboardCollection($this->whenLoaded('dashboards')),
                'dashboardsSettings' => new DashboardsSettingCollection($this->whenLoaded('dashboardsSettings')),
                'documentCounts' => new DocumentCountCollection($this->whenLoaded('documentCounts')),
                'documentsComments' => new DocumentsCommentCollection($this->whenLoaded('documentsComments')),
                'emailClicks' => new EmailClickCollection($this->whenLoaded('emailClicks')),
                'eventEmailClicks' => new EventEmailClickCollection($this->whenLoaded('eventEmailClicks')),
                'reportFiles' => new ReportFileCollection($this->whenLoaded('reportFiles')),
                'reports' => new ReportCollection($this->whenLoaded('reports')),
                'reportsCustomDocuments' => new ReportsCustomDocumentCollection($this->whenLoaded('reportsCustomDocuments')),
                'reportsCustomProviders' => new ReportsCustomProviderCollection($this->whenLoaded('reportsCustomProviders')),
                'reportsMailingLists' => new ReportsMailingListCollection($this->whenLoaded('reportsMailingLists')),
                'revisions' => new RevisionCollection($this->whenLoaded('revisions')),
                'sentEventAlerts' => new SentEventAlertCollection($this->whenLoaded('sentEventAlerts')),
                'stakeholders' => new StakeholderCollection($this->whenLoaded('stakeholders')),
                'userDocRequests' => new UserDocRequestCollection($this->whenLoaded('userDocRequests')),
                'userLimits' => new UserLimitCollection($this->whenLoaded('userLimits')),
                'interests' => new InterestCollection($this->whenLoaded('interests')),
            ]
        );
    }
}
