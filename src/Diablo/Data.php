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
     * Get item.
     *
     * @param string $itemId
     * @return array|mixed
     */
    public function getItem($itemId)
    {
        return $this->client->fetchData('data/item/' . $itemId, [], '', $this->client->getSeconds('24h'));
    }

    /**
     * Get follower.
     *
     * @param string $follower
     * @return array
     */
    public function getFollower($follower)
    {
        return $this->client->fetchData('data/follower/' . $follower, [], '', $this->client->getSeconds('24h'));
    }

    /**
     * Get follower templar.
     *
     * @return array
     */
    public function getFollowerTemplar()
    {
        return $this->getFollower('templar');
    }

    /**
     * Get follower enchantress.
     *
     * @return array
     */
    public function getFollowerEnchantress()
    {
        return $this->getFollower('enchantress');
    }

    /**
     * Get follower scoundrel.
     *
     * @return array
     */
    public function getFollowerScoundrel()
    {
        return $this->getFollower('scoundrel');
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