<?php

namespace App\Http\Resources\Author;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\StakeholdersList\StakeholdersListCollection;
use App\Http\Resources\Document\DocumentCollection;

class AuthorResource extends JsonResource
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
                'reports' => new ReportCollection($this->whenLoaded('reports')),
                'stakeholdersLists' => new StakeholdersListCollection($this->whenLoaded('stakeholdersLists')),
                'authorDocuments' => new DocumentCollection($this->whenLoaded('authorDocuments')),
                'personDocuments' => new DocumentCollection($this->whenLoaded('personDocuments')),
            ]
        );
    }
}
