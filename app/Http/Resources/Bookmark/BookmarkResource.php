<?php

namespace App\Http\Resources\Bookmark;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\TeamsList\TeamsListResource;
use App\Http\Resources\Document\DocumentResource;
use App\Http\Resources\Dashboard\DashboardResource;

class BookmarkResource extends JsonResource
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
                'teamsList' => new TeamsListResource($this->whenLoaded('teamsList')),
                'document' => new DocumentResource($this->whenLoaded('document')),
                'dashboard' => new DashboardResource($this->whenLoaded('dashboard')),
            ]
        );
    }
}
