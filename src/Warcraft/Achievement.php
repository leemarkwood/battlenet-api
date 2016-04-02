<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Achievement
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
     * Get achievement.
     *
     * @param int $achievementId
     * @return array
     */
    public function getAchievement($achievementId)
    {
        $path = 'achievement/' . intval($achievementId);
        return $this->client->fetchData($path, [], '', $this->client->getSeconds(Cache::getLifetimeLong()));
    }
}