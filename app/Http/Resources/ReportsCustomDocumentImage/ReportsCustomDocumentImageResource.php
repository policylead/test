<?php

namespace App\Http\Resources\ReportsCustomDocumentImage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Document\DocumentResource;

class ReportsCustomDocumentImageResource extends JsonResource
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
                'document' => new DocumentResource($this->whenLoaded('document')),
            ]
        );
    }
}
