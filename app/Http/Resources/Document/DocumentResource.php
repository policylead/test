<?php

namespace App\Http\Resources\Document;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Provider\ProviderResource;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\DocumentCount\DocumentCountCollection;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Resources\ReportsCustomDocumentImage\ReportsCustomDocumentImageCollection;
use App\Http\Resources\Author\AuthorCollection;

class DocumentResource extends JsonResource
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
                'provider' => new ProviderResource($this->whenLoaded('provider')),
                'bookmarks' => new BookmarkCollection($this->whenLoaded('bookmarks')),
                'documentCounts' => new DocumentCountCollection($this->whenLoaded('documentCounts')),
                'documentsComments' => new DocumentsCommentCollection($this->whenLoaded('documentsComments')),
                'reportsCustomDocumentImages' => new ReportsCustomDocumentImageCollection($this->whenLoaded('reportsCustomDocumentImages')),
                'authors' => new AuthorCollection($this->whenLoaded('authors')),
                'persons' => new AuthorCollection($this->whenLoaded('persons')),
            ]
        );
    }
}
