<?php

namespace App\Http\Resources\DocumentsComment;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentsCommentCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DocumentsCommentResource::class;
}
