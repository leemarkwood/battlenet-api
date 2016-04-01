# battlenet-api
php api for Battle.net game APIs ( https://dev.battle.net/ )
 - Cache built in.

# Installation
Add ```"mrcorex/battlenet-api": "^1"``` to your composer.json file and run "composer update".

# Usage

Set key, server and locale.
```php
\BattleNet\Config::setApiKey($key);
\BattleNet\Config::setServer(\BattleNet\Server::EU);
\BattleNet\Config::setLocale(\BattleNet\Locale::EN_GB);
```

To enable and use cache, specify path.
```php
\BattleNet\Config::setCachePath('/path/to/my/cache');
```

Example of getting character races for Warcraft.

```php
$data = new \BattleNet\Warcraft\Data();
$characterRaces = $data->getCharacterRaces();
```

Example of getting guild news for Warcraft.
```php
$guild = new \BattleNet\Warcraft\Guild('Realm', 'Guild');
$news = $guild->getNews();
```

Clearing cache for Warcraft.
```php
\BattleNet\Config::clearCache('wow');
```

It is highly recommended to setup cache. It will dramatically speed things up.

# TODO
 - Add media-links for various thumbnails, icons etc.
 - Add support for changing cache-times.

# ChangeLog
- 2016-04-02 Initial development.
