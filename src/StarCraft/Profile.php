<?php

namespace BattleNet\StarCraft;

use BattleNet\Client;

class Profile
{
    private $seconds;
    private $client;
    private $profileId;
    private $region;
    private $name;
    private $forceFetch;
    private $data;

    /**
     * Profile constructor.
     *
     * @param int $profileId
     * @param int $region
     * @param string $name
     * @param bool $forceFetch
     */
    public function __construct($profileId, $region, $name, $forceFetch = false)
    {
        $this->client = new Client('sc2');

        // Get data.
        $this->seconds = '24h';
        $this->profileId = $profileId;
        $this->region = $region;
        $this->name = $name;
        $this->forceFetch = $forceFetch;
        $path = 'profile/' . intval($profileId) . '/' . intval($region) . '/' . $name . '/';
        $this->data = $this->client->fetchData($path, [], '', $this->client->getSeconds($this->seconds), $forceFetch);
    }

    /**
     * Get display name.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get clan name.
     *
     * @return string
     */
    public function getClanName()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get clan tag.
     *
     * @return string
     */
    public function getClanTag()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get profile path.
     *
     * @return string
     */
    public function getProfilePath()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get portrait.
     *
     * @return array
     */
    public function getPortrait()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get career.
     *
     * @return array
     */
    public function getCareer()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get swarm levels.
     *
     * @return array
     */
    public function getSwarmLevels()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get campaign.
     *
     * @return array
     */
    public function getCampaign()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get season.
     *
     * @return array
     */
    public function getSeason()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get rewards.
     *
     * @return array
     */
    public function getRewards()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get achievements.
     *
     * @return array
     */
    public function getAchievements()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get all ladders.
     *
     * @return array
     */
    public function getLadderAll()
    {
        $path = 'profile/' . intval($this->profileId) . '/' . intval($this->region) . '/' . $this->name . '/ladders';
        return $this->client->fetchData($path, [], '', $this->client->getSeconds($this->seconds));
    }

    /**
     * Get ladder for current season.
     *
     * @return array
     */
    public function getLadderCurrentSeason()
    {
        $ladders = $this->getLadderAll();
        if (isset($ladders['currentSeason'])) {
            return $ladders['currentSeason'];
        }
        return [];
    }

    /**
     * Get ladder for previous season.
     *
     * @return array
     */
    public function getLadderPreviousSeason()
    {
        $ladders = $this->getLadderAll();
        if (isset($ladders['previousSeason'])) {
            return $ladders['previousSeason'];
        }
        return [];
    }

    /**
     * Get ladder showcase replacement.
     *
     * @return array
     */
    public function getLadderShowcasePlacement()
    {
        $ladders = $this->getLadderAll();
        if (isset($ladders['showcasePlacement'])) {
            return $ladders['showcasePlacement'];
        }
        return [];
    }

    /**
     * Get history matches.
     *
     * @return array
     */
    public function getMatches() {
        $path = 'profile/' . intval($this->profileId) . '/' . intval($this->region) . '/' . $this->name . '/matches';
        return $this->client->fetchData($path, [], 'matches', $this->client->getSeconds($this->seconds));
    }

    /**
     * Get data from fetch'ed data.
     *
     * @param string $name
     * @param null $defaultValue
     * @return mixed
     */
    private function getData($name, $defaultValue = null)
    {
        if (substr($name, 0, 3) == 'get') {
            $name = substr($name, 3);
            $name = lcfirst($name);
        }
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return $defaultValue;
    }
}