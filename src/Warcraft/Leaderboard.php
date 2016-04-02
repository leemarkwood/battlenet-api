<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Leaderboard
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
     * Get leaderboard for realm.
     *
     * @param string $realm
     * @return array
     */
    public function getLeaderboardRealm($realm)
    {
        return $this->client->fetchData('challenge/' . $realm, [], 'challenge', $this->client->getSeconds(Cache::getLifetimeShort()));
    }

    /**
     * Get leaderboard region.
     *
     * @return array
     */
    public function getLeaderboardRegion()
    {
        return $this->client->fetchData('challenge/region', [], 'challenge', $this->client->getSeconds(Cache::getLifetimeShort()));
    }

    /**
     * Get pvp leaderboard 2v2.
     *
     * @return array
     */
    public function getLeaderboard2V2()
    {
        return $this->client->fetchData('leaderboard/2v2', [], 'rows', $this->client->getSeconds(Cache::getLifetimeShort()));
    }

    /**
     * Get pvp leaderboard 3v3.
     *
     * @return array
     */
    public function getLeaderboard3V3()
    {
        return $this->client->fetchData('leaderboard/3v3', [], 'rows', $this->client->getSeconds(Cache::getLifetimeShort()));
    }

    /**
     * Get pvp leaderboard 5v5.
     *
     * @return array
     */
    public function getLeaderboard5V5()
    {
        return $this->client->fetchData('leaderboard/5v5', [], 'rows', $this->client->getSeconds(Cache::getLifetimeShort()));
    }

    /**
     * Get pvp leaderboard rated.
     *
     * @return array
     */
    public function getLeaderboardRated()
    {
        return $this->client->fetchData('leaderboard/rbg', [], 'rows', $this->client->getSeconds(Cache::getLifetimeShort()));
    }
}