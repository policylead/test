<?php

namespace App\Http\Resources\TwitterAccount;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TwitterAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  parent::toArray($request);
    }
}
