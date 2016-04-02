<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Zone
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
     * Get zones.
     *
     * @return array
     */
    public function getZones()
    {
        return $this->client->fetchData('zone/', [], 'zones', $this->client->getSeconds(Cache::getLifetimeLong()));
    }

    /**
     * Get zone.
     *
     * @param int $zoneId
     * @return array
     */
    public function getZone($zoneId)
    {
        return $this->client->fetchData('zone/' . intval($zoneId), [], '', $this->client->getSeconds(Cache::getLifetimeLong()));
    }
}