<?php

namespace EternalVoid\Modules\Research\Tasks;

use EternalVoid\Modules\Research\Models\Research;

/**
 * Class SetStartResearchTask
 *
 * @package EternalVoid\Modules\Planet\Tasks
 */
class SetStartResearchTask
{
    private $research;

    /**
     * SetStartResearchTask constructor.
     *
     * @param Research $research
     */
    public function __construct(Research $research)
    {
        $this->research = $research;
    }

    /**
     * @param array $user
     *
     * @return bool
     */
    public function run(array $user)
    {
        $this->research->created_uuid = $user['uuid'];
        $this->research->updated_uuid = $user['uuid'];

        return $this->research->save();
    }
}