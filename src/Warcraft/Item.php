<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Item
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
     * Get item.
     *
     * @param int $itemId
     * @return array
     */
    public function getItem($itemId)
    {
        return $this->client->fetchData('item/' . intval($itemId), [], '', $this->client->getSeconds(Cache::getLifetimeLong()));
    }

    /**
     * Get item set.
     *
     * @param int $setId
     * @return array
     */
    public function getItemSet($setId)
    {
        return $this->client->fetchData('item/set/' . intval($setId), [], '', $this->client->getSeconds(Cache::getLifetimeLong()));
    }
}