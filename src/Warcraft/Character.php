<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Character
{
    private $fields = 'achievements,appearance,feed,guild,hunterPets,items,mounts,pets,petSlots,progression,pvp,quests,reputation,statistics,stats,talents,titles,audit';
    private $data;

    /**
     * Character constructor.
     *
     * @param string $realm
     * @param string $character
     * @param bool $forceFetch
     */
    public function __construct($realm, $character, $forceFetch = false)
    {
        $client = new Client('wow');

        // Get data.
        $params = [
            'fields' => $this->fields
        ];
        $this->data = $client->fetchData('character/' . $realm . '/' . $character, $params, '', $client->getSeconds('24h'), $forceFetch);
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
     * Get class.
     *
     * @return int
     */
    public function getClass()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get race.
     *
     * @return int
     */
    public function getRace()
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
     * Get achievement points.
     *
     * @return int
     */
    public function getAchievementPoints()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get thumbnail.
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->getData(__FUNCTION__, '');
    }

    /**
     * Get calc-class.
     *
     * @return string
     */
    public function getCalcClass()
    {
        return $this->getData(__FUNCTION__, '');
    }

    /**
     * Get faction.
     *
     * @return int
     */
    public function getFaction()
    {
        return $this->getData(__FUNCTION__, 0);
    }

    /**
     * Get total honorable kills.
     *
     * @return int
     */
    public function getTotalHonorableKills()
    {
        return $this->getData(__FUNCTION__, '');
    }

    /**
     * Get guild.
     *
     * @return array
     */
    public function getGuild()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get feed.
     *
     * @return array
     */
    public function getFeed()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get items.
     *
     * @return array
     */
    public function getItems()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get stats.
     *
     * @return array
     */
    public function getStats()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get reputation.
     *
     * @return array
     */
    public function getReputation()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get titles.
     *
     * @return array
     */
    public function getTitles()
    {
        return $this->getData(__FUNCTION__, []);
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
     * Get statistics.
     *
     * @return array
     */
    public function getStatistics()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get talents.
     *
     * @return array
     */
    public function getTalents()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get appearance.
     *
     * @return array
     */
    public function getAppearance()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get mounts.
     *
     * @return array
     */
    public function getMounts()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get pets.
     *
     * @return array
     */
    public function getPets()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get pet slots.
     *
     * @return array
     */
    public function getPetSlots()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get progression.
     *
     * @return array
     */
    public function getProgression()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get pvp.
     *
     * @return array
     */
    public function getPvp()
    {
        $data = $this->getData(__FUNCTION__, []);
        if (isset($data['brackets'])) {
            return $data['brackets'];
        }
        return [];
    }

    /**
     * Get quests.
     *
     * @return array
     */
    public function getQuests()
    {
        return $this->getData(__FUNCTION__, []);
    }

    /**
     * Get audit.
     *
     * @return array
     */
    public function getAudit()
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