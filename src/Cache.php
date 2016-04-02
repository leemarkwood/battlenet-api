<?php

namespace BattleNet;

class Cache
{
    private static $lifetimeShort;
    private static $lifetimeLong;

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
}