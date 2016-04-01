<?php

namespace BattleNet\Warcraft;

use BattleNet\Client;

class Recipe
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
     * Get recipe.
     *
     * @param int $recipeId
     * @return array
     */
    public function getRecipe($recipeId)
    {
        return $this->client->fetchData('recipe/' . intval($recipeId), [], '', $this->client->getSeconds('24h'));
    }
}