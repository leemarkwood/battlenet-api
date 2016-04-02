<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Quest
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
     * Get quest.
     *
     * @param $questId
     * @return array
     */
    public function getQuest($questId)
    {
        return $this->client->fetchData('quest/' . intval($questId), [], '', $this->client->getSeconds(Cache::getLifetimeLong()));
    }
}