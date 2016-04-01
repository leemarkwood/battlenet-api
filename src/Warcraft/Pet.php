<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Pet
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
     * Get pets.
     *
     * @return array
     */
    public function getPets()
    {
        return $this->client->fetchData('pet/', [], 'pets', $this->client->getSeconds('24h'));
    }

    /**
     * Get pet ability.
     *
     * @param int $abilityId
     * @return array
     */
    public function getPetAbility($abilityId)
    {
        return $this->client->fetchData('pet/ability/' . intval($abilityId), [], '', $this->client->getSeconds('24h'));
    }

    /**
     * Get pet species.
     *
     * @param $speciesId
     * @return array
     */
    public function getPetSpecies($speciesId)
    {
        return $this->client->fetchData('pet/species/' . intval($speciesId), [], '', $this->client->getSeconds('24h'));
    }

    /**
     * Get pet stats.
     *
     * @param int $speciesId
     * @param int $level
     * @param int $breedId
     * @param int $qualityId
     * @return array
     */
    public function getPetStats($speciesId, $level = 1, $breedId = 3, $qualityId = 1)
    {
        return $this->client->fetchData('pet/stats/' . intval($speciesId), [
            'level' => intval($level),
            'breedId' => intval($breedId),
            'qualityId' => intval($qualityId)
        ], '', $this->client->getSeconds('5m'));
    }
}