<?php

namespace App\Http\Resources\StakeholdersDatum;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\StakeholdersList\StakeholdersListCollection;

class StakeholdersDatumResource extends JsonResource
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
                'stakeholdersLists' => new StakeholdersListCollection($this->whenLoaded('stakeholdersLists')),
            ]
        );
    }
}
