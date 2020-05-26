<?php

namespace App\Http\Resources\StakeholdersList;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Stakeholder\StakeholderResource;
use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\StakeholdersDatum\StakeholdersDatumResource;

class StakeholdersListResource extends JsonResource
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
                'stakeholder' => new StakeholderResource($this->whenLoaded('stakeholder')),
                'author' => new AuthorResource($this->whenLoaded('author')),
                'stakeholderData' => new StakeholdersDatumResource($this->whenLoaded('stakeholderData')),
            ]
        );
    }
}
