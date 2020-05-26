<?php

namespace App\Http\Resources\ContentPartner;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\TeamsList\TeamsListResource;

class ContentPartnerResource extends JsonResource
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
            ]
        );
    }
}
