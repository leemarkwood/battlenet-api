<?php

namespace BattleNet;

class Cache
{
    private static $lifetimeShort;
    private static $lifetimeLong;

    /**
     * Load from cache.
     *
     * @param string $prefix
     * @param string $path
     * @param array $params
     * @param int $lifetimeSeconds
     * @return bool|array
     */
    public static function load($prefix, $path, $params, $lifetimeSeconds)
    {
        if (Config::getCachePath() == '' || $lifetimeSeconds == 0) {
            return [];
        }
        $cacheFilename = self::getCacheFilename($prefix, $path, $params);
        if (file_exists($cacheFilename)) {
            if (filemtime($cacheFilename) > (time() - $lifetimeSeconds)) {
                $json = file_get_contents($cacheFilename);
                return json_decode($json, true);
            } else {
                if (file_exists($cacheFilename)) {
                    unlink($cacheFilename);
                }
            }
        }
        return [];
    }

    /**
     * Save to cache.
     *
     * @param string $prefix
     * @param string $path
     * @param array $params
     * @param array $data
     */
    public static function save($prefix, $path, $params, $data)
    {
        if (Config::getCachePath() == '') {
            return;
        }
        $cacheFilename = self::getCacheFilename($prefix, $path, $params);
        @file_put_contents($cacheFilename, json_encode($data));
    }

    /**
     * Get lifetime short. Default 5 minutes.
     *
     * @return string
     */
    public static function getLifetimeShort()
    {
        if (self::$lifetimeShort === null) {
            self::$lifetimeShort = '5m';
        }
        return self::$lifetimeShort;
    }

    /**
     * Set lifetime short.
     *
     * @param string $lifetime Add 'm' for minutes, 'h' for hours. If not specified, seconds are assumed.
     */
    public static function setLifetimeShort($lifetime)
    {
        self::$lifetimeShort = $lifetime;
    }

    /**
     * Get lifetime long. Default 24 hours.
     *
     * @return string
     */
    public static function getLifetimeLong()
    {
        if (self::$lifetimeLong === null) {
            self::$lifetimeLong = '24h';
        }
        return self::$lifetimeLong;
    }

    /**
     * Set lifetime long.
     *
     * @param string $lifetime Add 'm' for minutes, 'h' for hours. If not specified, seconds are assumed.
     */
    public static function setLifetimeLong($lifetime)
    {
        self::$lifetimeLong = $lifetime;
    }

    /**
     * Get cache-filename.
     *
     * @param string $prefix
     * @param string $path
     * @param array $params
     * @return string
     */
    private static function getCacheFilename($prefix, $path, $params)
    {
        $code = str_replace('/', '.', $path);
        if (substr($code, 0, 1) == '.') {
            $code = substr($code, 1);
        }
        if (substr($code, -1) == '.') {
            $code = substr($code, 0, -1);
        }
        if (count($params) > 0) {
            $code .= '.' . md5(serialize($params));
        }
        $filename = $prefix . '.' . $code . '.json';
        $filename = Config::getCachePath() . '/' . $filename;
        return $filename;
    }
}