<?php

namespace BattleNet\Diablo;

use BattleNet\Client;

class Hero
{
    private $data;

    /**
     * Career constructor.
     *
     * @param string $battleTag
     * @param int $heroId
     * @param bool $forceFetch
     */
    public function __construct($battleTag, $heroId, $forceFetch = false)
    {
        $client = new Client('d3');

        // Get data.
        $this->data = $client->fetchData('profile/' . $battleTag . '/hero/' . intval($heroId), [], '', $client->getSeconds('24h'),
            $forceFetch);
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get class.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get gender.
     *
     * @return int
     */
    public function getGender()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel()
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
     * Get paragon level.
     *
     * @return int
     */
    public function getParagonLevel()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get hardcore.
     *
     * @return mixed
     */
    public function getHardcore()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get seasonal.
     *
     * @return mixed
     */
    public function getSeasonal()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get season created.
     *
     * @return int
     */
    public function getSeasonCreated()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get skills.
     *
     * @param string $type 'active', 'passive'.
     * @return array|mixed
     */
    public function getSkills($type = '')
    {
        $data = $this->getData(__FUNCTION__, 0);
        if ($type != '') {
            if (isset($data[$type])) {
                return $data[$type];
            }
            return [];
        }
        return $data;
    }

    /**
     * Get skills active.
     *
     * @return array
     */
    public function getSkillsActive()
    {
        return $this->getSkills('active');
    }

    /**
     * Get skills passive.
     *
     * @return array
     */
    public function getSkillsPassive()
    {
        return $this->getSkills('passive');
    }

    /**
     * Get items.
     *
     * @return array
     */
    public function getItems()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get followers.
     * '
     *
     * @return array
     */
    public function getFollowers()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get legendary powers.
     *
     * @return array
     */
    public function getLegendaryPowers()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get stats.
     *
     * @return array
     */
    public function getStats()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get progression.
     *
     * @return array
     */
    public function getProgression()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get dead.
     *
     * @return mixed
     */
    public function getDead()
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
        return $this->getData('last-updated', 0);
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