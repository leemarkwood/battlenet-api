<?php

namespace BattleNet\Warcraft;

use BattleNet\Cache;
use BattleNet\Client;

class Auction
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
     * Get auction details.
     *
     * @param string $realm
     * @return array
     */
    public function getAuctions($realm)
    {
        $data = $this->client->fetchData('auction/data/' . $realm, [], 'files', $this->client->getSeconds(Cache::getLifetimeShort()));
        if (isset($data[0])) {
            return $data[0];
        }
        return [];
    }
}