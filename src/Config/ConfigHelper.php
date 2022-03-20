<?php

namespace Evster\SitemapGenerator\Config;

use Evster\SitemapGenerator\Exception\ConfigurationException;

class ConfigHelper
{
    /**
     * @var ConfigInstance
     */
    private static ConfigInstance $configInstance;

    /**
     * @param string $path
     * @return array|mixed|null
     * @throws ConfigurationException
     */
    public static function get(string $path)
    {
        if (!isset(static::$configInstance)) {
            static::$configInstance = new ConfigInstance();
        }

        return static::$configInstance->get($path);
    }
}
