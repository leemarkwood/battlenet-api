<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Realm
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
     * Get realms.
     *
     * @return array
     */
    public function getRealms()
    {
        return $this->client->fetchData('realm/status', [], 'realms', $this->client->getSeconds('5m'));
    }
}