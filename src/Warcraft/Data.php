<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Data
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
     * Get battlegroups.
     *
     * @return array
     */
    public function getBattlegroups()
    {
        return $this->client->fetchData('data/battlegroups/', [], 'battlegroups', $this->client->getSeconds('24h'));
    }

    /**
     * Get character races.
     *
     * @return array
     */
    public function getCharacterRaces()
    {
        return $this->client->fetchData('data/character/races', [], 'races', $this->client->getSeconds('24h'));
    }

    /**
     * Get character classes.
     *
     * @return array
     */
    public function getCharacterClasses()
    {
        return $this->client->fetchData('data/character/classes', [], 'classes', $this->client->getSeconds('24h'));
    }

    /**
     * Get character achievements.
     *
     * @return array
     */
    public function getCharacterAchievements()
    {
        return $this->client->fetchData('data/character/achievements', [], 'achievements', $this->client->getSeconds('24h'));
    }

    /**
     * Get guild rewards.
     *
     * @return array
     */
    public function getGuildRewards()
    {
        return $this->client->fetchData('data/guild/rewards', [], 'rewards', $this->client->getSeconds('24h'));
    }

    /**
     * Get guild perks.
     *
     * @return array
     */
    public function getGuildPerks()
    {
        return $this->client->fetchData('data/guild/perks', [], 'perks', $this->client->getSeconds('24h'));
    }

    /**
     * Get guild achievements.
     *
     * @return array
     */
    public function getGuildAchievements()
    {
        return $this->client->fetchData('data/guild/achievements', [], 'achievements', $this->client->getSeconds('24h'));
    }

    /**
     * Get item classes.
     *
     * @return array
     */
    public function getItemClasses()
    {
        return $this->client->fetchData('data/item/classes', [], 'classes', $this->client->getSeconds('24h'));
    }

    /**
     * Get talents.
     *
     * @return array
     */
    public function getTalents()
    {
        return $this->client->fetchData('data/talents', [], '', $this->client->getSeconds('24h'));
    }

    /**
     * Get pet types.
     *
     * @return array
     */
    public function getPetTypes()
    {
        return $this->client->fetchData('data/pet/types', [], 'petTypes', $this->client->getSeconds('24h'));
    }
}