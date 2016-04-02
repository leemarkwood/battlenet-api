<?php

namespace BattleNet\StarCraft;

use BattleNet\Client;

class Data
{
    private $client;

    /**
     * Data constructor.
     */
    public function __construct()
    {
        $this->client = new Client('sc2');
    }

    /**
     * Get achievements.
     *
     * @return array
     */
    public function getAchievements()
    {
        return $this->client->fetchData('data/achievements', [], 'achievements', $this->client->getSeconds('24h'));
    }

    /**
     * Get achievement categories.
     *
     * @return array
     */
    public function getAchievementCategories()
    {
        return $this->client->fetchData('data/achievements', [], 'categories', $this->client->getSeconds('24h'));
    }

    /**
     * Get rewards.
     *
     * @return array
     */
    public function getRewards()
    {
        return $this->client->fetchData('data/rewards', [], '', $this->client->getSeconds('24h'));
    }
}