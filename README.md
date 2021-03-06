# battlenet-api
php api for Battle.net game APIs ( https://dev.battle.net/ )
 - Cache built in.


## Installation
Add ```"mrcorex/battlenet-api": "^1"``` to your composer.json file and run "composer update".


## Setting configuration.

Set key, server and locale.
```php
\BattleNet\Config::setApiKey($key);
\BattleNet\Config::setServer(\BattleNet\Server::EU);
\BattleNet\Config::setLocale(\BattleNet\Locale::EN_GB);
```

To enable and use cache, specify path where to store cache-files (json).
```php
\BattleNet\Config::setCachePath('/path/to/my/cache');
```


## Warcraft.

#### Example of getting character races.

```php
$data = new \BattleNet\Warcraft\Data();
$characterRaces = $data->getCharacterRaces();
```


## Diablo.

#### Example of getting data for blacksmith.

```php
$data = new \BattleNet\Diablo\Data();
$blacksmith = $data->getArtisanBlacksmith();
```


## StarCraft.

#### Example of getting data for rewards.

```php
$data = new \BattleNet\StarCraft\Data();
$rewards = $data->getRewards();
```


## Clearing cache.
```php
\BattleNet\Config::clearCache('wow');
```

Notice that you need to specify "wow", "sc2" and "d3" to clear cache for specific game.


## TODO
 - Add media-links for various thumbnails, icons etc.
 - Add support for Auth.


## ChangeLog
 - 2016-04-02 1.0.0 Initial development.
 - 2016-04-02 1.1.0 Added support for StarCraft.
 - 2016-04-02 1.1.1 Added getMatches() for StarCraft.
 - 2016-04-02 1.2.0 Added support for Diablo.
 - 2016-04-02 1.3.0 Added support for changing cache-lifetime (short/long).
 - 2016-04-02 1.4.0 Refactored cache handler for general usage.

