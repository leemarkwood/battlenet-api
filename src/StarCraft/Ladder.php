<?php

namespace BattleNet\StarCraft;

use BattleNet\Client;

class Ladder
{
    private $client;

    /**
     * Data constructor.
     */
    public function __construct()
    {
        $this->client = new Client('sc2');
    }

    /**
     * Get ladder.
     *
     * @param int $ladderId
     * @return array
     */
    public function getLadder($ladderId)
    {
        return $this->client->fetchData('ladder/' . intval($ladderId), [], '', $this->client->getSeconds('5m'));
    }
}