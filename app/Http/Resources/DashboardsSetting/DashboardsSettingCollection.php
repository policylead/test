<?php

namespace App\Http\Resources\DashboardsSetting;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DashboardsSettingCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DashboardsSettingResource::class;
}
