<?php

namespace App\Http\Resources\ReportsCustomProvider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\TeamsList\TeamsListResource;

class ReportsCustomProviderResource extends JsonResource
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
            ]
        );
    }
}
