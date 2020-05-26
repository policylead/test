<?php

namespace App\Http\Resources\TaggingTagged;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SentEmailAlert\SentEmailAlertResource;

class TaggingTaggedResource extends JsonResource
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
                'sentEmailAlert' => new SentEmailAlertResource($this->whenLoaded('sentEmailAlert')),
            ]
        );
    }
}
