<?php

namespace BattleNet;

class Config
{
    private static $apiKey;
    private static $server;
    private static $locale;
    private static $cachePath;

    /**
     * Set api-key.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * Get api-key.
     *
     * @return string
     */
    public static function getApiKey()
    {
        if (self::$apiKey === null) {
            self::$apiKey = '';
        }
        return self::$apiKey;
    }

    /**
     * Set server.
     *
     * @param string $server Use Enums\Server::.
     */
    public static function setServer($server)
    {
        self::$server = $server;
    }

    /**
     * Get server.
     *
     * @return string
     */
    public static function getServer()
    {
        if (self::$server === null) {
            self::$server = '';
        }
        return self::$server;
    }

    /**
     * Set locale
     *
     * @param string $locale Use Enums\Locale::.
     */
    public static function setLocale($locale)
    {
        self::$locale = $locale;
    }

    /**
     * Get locale.
     *
     * @return string
     */
    public static function getLocale()
    {
        if (self::$locale === null) {
            self::$locale = '';
        }
        return self::$locale;
    }

    /**
     * Check if configuration is valid.
     *
     * @return bool
     */
    public static function isValid()
    {
        return self::getApiKey() != '' && self::getServer() != '' && self::getLocale() != '';
    }

    /**
     * Set cache-path.
     *
     * @param string $cachePath
     * @throws \Exception
     */
    public static function setCachePath($cachePath)
    {
        if (!is_writeable($cachePath)) {
            throw new \Exception('[' . $cachePath . '] is not writeable.');
        }
        if (substr($cachePath, -1) == '/') {
            $cachePath = substr($cachePath, 0, -1);
        }
        self::$cachePath = $cachePath;
    }

    /**
     * Get cache-path.
     */
    public static function getCachePath()
    {
        if (self::$cachePath === null) {
            self::$cachePath = '';
        }
        return self::$cachePath;
    }

    /**
     * Clear cache.
     *
     * @param string $game (wow, sc2, d3).
     */
    public static function clearCache($game)
    {
        $cachePath = self::getCachePath();
        if ($cachePath != '') {
            $filenames = scandir($cachePath);
            if (count($filenames) > 0) {
                foreach ($filenames as $filename) {
                    if (substr($filename, 0, 1) == '.') {
                        continue;
                    }
                    if ($game != '' && substr($filename, 0, strlen($game) + 1) != $game . '.') {
                        continue;
                    }
                    unlink($cachePath . '/' . $filename);
                }
            }
        }
    }
}