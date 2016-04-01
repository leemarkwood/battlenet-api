<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Mount
{
    private $client;

    /**
     * Data constructor.
     */
    public function __construct()
    {
        $this->client = new Client('wow');
    }

    /**
     * Get mounts.
     *
     * @return array
     */
    public function getMounts()
    {
        return $this->client->fetchData('mount/', [], 'mounts', $this->client->getSeconds('24h'));
    }

    /**
     * Get mount by spell-id.
     *
     * @param int $spellId
     * @return array
     */
    public function getMount($spellId)
    {
        $mounts = $this->getMounts();
        if (count($mounts) > 0) {
            foreach ($mounts as $mount) {
                if ($mount['spellId'] == $spellId) {
                    return $mount;
                };
            }
        }
        return [];
    }
}