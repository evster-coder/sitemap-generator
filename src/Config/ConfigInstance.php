<?php

namespace Evster\SitemapGenerator\Config;

use Evster\SitemapGenerator\Exception\ConfigurationException;

class ConfigInstance
{
    /**
     * @var array|mixed
     */
    private array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/params.php';
    }

    /**
     * @param string $path
     * @return array|mixed|null
     * @throws ConfigurationException
     */
    public function get(string $path)
    {
        $pathArr = explode('.', $path);

        $item = $this->config;

        foreach ($pathArr as $pathItem) {
            $item = $item[$pathItem] ?? null;

            if ($item === null) {
                throw new ConfigurationException($path . ' - No values specified for configuration parameters');
            }
        }

        return $item;
    }
}