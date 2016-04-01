<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Guild
{
    private $fields = 'members,achievements,news,challenge';
    private $data;

    /**
     * Guild constructor.
     *
     * @param string $realm
     * @param string $guild
     * @param bool $forceFetch
     */
    public function __construct($realm, $guild, $forceFetch = false)
    {
        $client = new Client('wow');

        // Get data.
        $params = [
            'fields' => $this->fields
        ];
        $this->data = $client->fetchData('guild/' . $realm . '/' . $guild, $params, '', $client->getSeconds('30m'), $forceFetch);
    }

    /**
     * Get last modified.
     *
     * @return int
     */
    public function getLastModified()
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
        return $this->getData(__FUNCTION__, '');
    }

    /**
     * Get realm.
     *
     * @return string
     */
    public function getRealm()
    {
        return $this->getData(__FUNCTION__, '');
    }

    /**
     * Get battlegroup.
     *
     * @return string
     */
    public function getBattlegroup()
    {
        return $this->getData(__FUNCTION__, '');
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
     * Get side.
     *
     * @return int
     */
    public function getSide()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get achievement points.
     *
     * @return int
     */
    public function getAchievementPoints()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get emblem.
     *
     * @return array
     */
    public function getEmblem()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get members.
     *
     * @return array
     */
    public function getMembers()
    {
        $members = $this->getData(__FUNCTION__, []);
        if (count($members) > 0) {
            foreach ($members as $index => $member) {
                $rank = $member['rank'];
                $member = $member['character'];
                $member['rank'] = $rank;
                $members[$index] = $member;
            }
        }
        return $members;
    }

    /**
     * Get achievemetns completed.
     *
     * @return array
     */
    public function getAchievementsCompleted()
    {
        $achievements = $this->getData('achievements', []);
        $result = [];
        if (count($achievements['achievementsCompleted']) > 0) {
            foreach ($achievements['achievementsCompleted'] as $index => $achievementId) {
                $result[] = [
                    'id' => $achievementId,
                    'timestamp' => $achievements['achievementsCompletedTimestamp'][$index]
                ];
            }
        }
        return $result;
    }

    /**
     * Get achievement criteria.
     *
     * @return array
     */
    public function getAchievementsCriteria()
    {
        $achievements = $this->getData('achievements', []);
        $result = [];
        if (count($achievements['criteria']) > 0) {
            foreach ($achievements['criteria'] as $index => $criteriaId) {
                $result[] = [
                    'id' => $criteriaId,
                    'quantity' => $achievements['criteriaQuantity'][$index],
                    'timestamp' => $achievements['criteriaTimestamp'][$index],
                    'created' => $achievements['criteriaCreated'][$index]
                ];
            }
        }
        return $result;
    }

    /**
     * Get news.
     *
     * @return array
     */
    public function getNews()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get challenge.
     *
     * @return array
     */
    public function getChallenge()
    {
        return $this->getData(__FUNCTION__, []);
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