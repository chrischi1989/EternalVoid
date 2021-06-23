<?php

namespace EternalVoid\Research\Tasks;

use EternalVoid\Research\Models\Research;
use Ramsey\Uuid\Uuid;

/**
 * Class SetStartResearchTask
 *
 * @package EternalVoid\Planet\Tasks
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
