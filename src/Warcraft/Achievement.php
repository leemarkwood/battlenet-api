<?php

namespace BattleNet\Warcraft;

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
        return $this->client->fetchData('achievement/' . intval($achievementId), [], '', $this->client->getSeconds('24h'));
    }
}