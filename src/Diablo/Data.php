<?php

namespace BattleNet\Diablo;

use BattleNet\Client;

class Data
{
    private $client;

    /**
     * Data constructor.
     */
    public function __construct()
    {
        $this->client = new Client('d3');
    }

    /**
     * Get artisan.
     *
     * @param string $artisan
     * @return array
     */
    public function getArtisan($artisan)
    {
        return $this->client->fetchData('data/artisan/' . $artisan, [], '', $this->client->getSeconds('24h'));
    }

    /**
     * Get artisan blacksmith.
     *
     * @return array
     */
    public function getArtisanBlacksmith()
    {
        return $this->getArtisan('blacksmith');
    }

    /**
     * Get artisan jeweler.
     *
     * @return array
     */
    public function getArtisanJeweler()
    {
        return $this->getArtisan('jeweler');
    }

    /**
     * Get artisan mystic.
     *
     * @return array
     */
    public function getArtisanMystic()
    {
        return $this->getArtisan('mystic');
    }
}