<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\TeamsList\TeamsListResource;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\DashboardsKeyword\DashboardsKeywordCollection;
use App\Http\Resources\DashboardsSetting\DashboardsSettingCollection;
use App\Http\Resources\SentEmailAlert\SentEmailAlertCollection;

class DashboardResource extends JsonResource
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
                'team' => new TeamsListResource($this->whenLoaded('team')),
                'bookmarks' => new BookmarkCollection($this->whenLoaded('bookmarks')),
                'dashboardsKeywords' => new DashboardsKeywordCollection($this->whenLoaded('dashboardsKeywords')),
                'dashboardsSettings' => new DashboardsSettingCollection($this->whenLoaded('dashboardsSettings')),
                'sentEmailAlerts' => new SentEmailAlertCollection($this->whenLoaded('sentEmailAlerts')),
            ]
        );
    }
}
