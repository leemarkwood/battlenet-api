<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Boss
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
     * Get bosses.
     *
     * @return array
     */
    public function getBosses()
    {
        return $this->client->fetchData('boss/', [], 'bosses', $this->client->getSeconds(Cache::getLifetimeLong()));
    }

    /**
     * Get boss.
     *
     * @param int $bossId
     * @return array
     */
    public function getBoss($bossId)
    {
        return $this->client->fetchData('boss/' . intval($bossId), [], '', $this->client->getSeconds(Cache::getLifetimeLong()));
    }
}