<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Spell
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
     * Get spell.
     *
     * @param int $spellId
     * @return array
     */
    public function getSpell($spellId)
    {
        return $this->client->fetchData('spell/' . intval($spellId), [], '', $this->client->getSeconds('24h'));
    }
}