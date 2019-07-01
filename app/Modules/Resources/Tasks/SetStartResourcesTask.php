<?php

namespace EternalVoid\Modules\Resources\Tasks;

use EternalVoid\Modules\Planet\Models\Planet;
use EternalVoid\Modules\Resources\Models\Resource;

/**
 * Class SetStartResourcesTask
 *
 * @package EternalVoid\Modules\Resources\Tasks
 */
class SetStartResourcesTask
{
    /**
     * @var Resource
     */
    private $resource;

    /**
     * SetStartResourcesTask constructor.
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @param Planet $planet
     *
     * @return bool
     */
    public function run(Planet $planet): bool
    {
        $this->resource->planet_uuid  = $planet->uuid;
        $this->resource->created_uuid = $planet->settled_uuid;
        $this->resource->updated_uuid = $planet->settled_uuid;

        return $this->resource->save();
    }
}