<?php

namespace BattleNet;

class Client
{
    private $prefix;
    private $code;
    private $message;
    private $url;
    private $apiKey;
    private $server;
    private $locale;

    /**
     * BattleNetClient constructor.
     *
     * @param string $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
        if (!Config::isValid()) {
            $this->throwException('Configuration not set via BattleNet\Config.');
        }
        $this->code = 200;
        $this->message = '';
        $this->url = '';
        $this->apiKey = Config::getApiKey();
        $this->server = Config::getServer();
        $this->locale = Config::getLocale();
    }

    /**
     * Fetch data.
     *
     * @param string $path
     * @param array $params
     * @param string $tag
     * @param int $cacheLifetime
     * @param bool $forceFetch
     * @return array|mixed
     */
    public function fetchData($path, $params = [], $tag = '', $cacheLifetime = 0, $forceFetch = false)
    {
        // Set default values.
        $this->code = 200;
        $this->message = '';
        $fetch = true;
        $data = Cache::load($this->prefix, $path, $params, $cacheLifetime);
        if (!$forceFetch && count($data) > 0) {
            $fetch = false;
        }
        if ($fetch) {

            // Build and request data.
            $this->url = $this->buildUrl($path, $params);
            try {
                $client = new \GuzzleHttp\Client();
                $result = $client->get($this->url);
                if ($result->getStatusCode() == 200) {
                    $data = json_decode($result->getBody(), true);
                }
            } catch (\Exception $e) {
                $this->code = $e->getCode();
                $this->message = $e->getMessage();
            }

            // Save cache.
            if ($cacheLifetime > 0) {
                Cache::save($this->prefix, $path, $params, $data);
            }
        }

        // Extract on tag.
        if ($tag != '' && isset($data[$tag])) {
            $data = $data[$tag];
        }

        return $data;
    }

    /**
     * Get http-code.
     *
     * @return int
     */
    public function getHttpCode()
    {
        return $this->code;
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Throw exception.
     *
     * @param string $message
     * @throws \Exception
     */
    public function throwException($message)
    {
        $prefix = $this->prefix;
        $prefix = $prefix == 'wow' ? 'Warcraft' : $prefix;
        $prefix = $prefix == 'sc2' ? 'StarCraft' : $prefix;
        $prefix = $prefix == 'd3' ? 'Diablo' : $prefix;
        throw new \Exception($prefix . ': ' . $message);
    }

    /**
     * Get seconds based on input.
     *
     * @param string $seconds Specify h for hours, m for minutes, otherwise seconds. Example: 24h.
     * @return int
     */
    public function getSeconds($seconds)
    {
        // Convert to minutes if hour.
        if (substr($seconds, -1) == 'h') {
            $seconds = (intval($seconds) * 60) . 'm';
        }

        // Convert to seconds if minutes.
        if (substr($seconds, -1) == 'm') {
            $seconds = (intval($seconds) * 60) . 's';
        }

        return intval($seconds);
    }

    /**
     * Build url.
     *
     * @param string $path
     * @param array $params
     * @return string
     */
    private function buildUrl($path, $params)
    {
        $url = 'https://' . $this->server . '.api.blizzard.com/' . $this->prefix;
        $url .= '/' . $path;
        $url .= '?locale=' . $this->locale;
        $url .= '&apikey=' . $this->apiKey;
        if (count($params) > 0) {
            foreach ($params as $name => $value) {
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                if ($value != '') {
                    $url .= '&' . $name . '=';
                $url .= $value;
                }
            }
        }
        return $url;
    }
}