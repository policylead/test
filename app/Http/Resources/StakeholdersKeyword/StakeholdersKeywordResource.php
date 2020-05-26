<?php

namespace App\Http\Resources\StakeholdersKeyword;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Stakeholder\StakeholderResource;

class StakeholdersKeywordResource extends JsonResource
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
            ]
        );
    }
}
