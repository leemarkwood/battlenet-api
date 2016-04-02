<?php

namespace BattleNet\Diablo;

use BattleNet\Client;

class Career
{
    private $data;

    /**
     * Career constructor.
     *
     * @param string $battleTag
     * @param bool $forceFetch
     */
    public function __construct($battleTag, $forceFetch = false)
    {
        $client = new Client('d3');

        // Get data.
        $this->data = $client->fetchData('profile/' . $battleTag . '/', [], '', $client->getSeconds('24h'), $forceFetch);
    }

    /**
     * Get battle tag.
     *
     * @return string
     */
    public function getBattleTag()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get paragon level.
     *
     * @return int
     */
    public function getParagonLevel()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get paragon level hardcore.
     *
     * @return int
     */
    public function getParagonLevelHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get paragon level season.
     *
     * @return int
     */
    public function getParagonLevelSeason()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get paragon level season hardcore.
     *
     * @return int
     */
    public function getParagonLevelSeasonHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get guild name.
     *
     * @return string
     */
    public function getGuildName()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get heroies.
     *
     * @return array
     */
    public function getHeroes()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get last hero played.
     *
     * @return int
     */
    public function getLastHeroPlayed()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get last updated.
     *
     * @return int
     */
    public function getLastUpdated()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get kills.
     *
     * @return array
     */
    public function getKills()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get highest hardcore level.
     *
     * @return int
     */
    public function getHighestHardcoreLevel()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get time played.
     *
     * @return array
     */
    public function getTimePlayed()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get progression.
     *
     * @return int
     */
    public function getProgression()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get fallen heroes.
     *
     * @return array
     */
    public function getFallenHeroes()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get blacksmith.
     *
     * @return array
     */
    public function getBlacksmith()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get jeweler.
     *
     * @return array
     */
    public function getJeweler()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get mystic.
     *
     * @return array
     */
    public function getMystic()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get blacksmith hardcore.
     *
     * @return array
     */
    public function getBlacksmithHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get jeweler hardcore.
     *
     * @return array
     */
    public function getJewelerHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get mystic hardcore.
     *
     * @return array
     */
    public function getMysticHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get blacksmith season hardcore.
     *
     * @return array
     */
    public function getBlacksmithSeasonHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get jeweler season hardcore.
     *
     * @return array
     */
    public function getJewelerSeasonHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get mystic season hardcore.
     *
     * @return array
     */
    public function getMysticSeasonHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get seasonal profiles.
     *
     * @return array
     */
    public function getSeasonalProfiles()
    {
        return $this->getData(__FUNCTION__, 0);
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