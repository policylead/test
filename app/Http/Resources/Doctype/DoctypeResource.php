<?php

namespace App\Http\Resources\Doctype;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctypeResource extends JsonResource
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
