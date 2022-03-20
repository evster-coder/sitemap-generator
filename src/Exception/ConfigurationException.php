<?php

namespace Evster\SitemapGenerator\Exception;

use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Exception;

class ConfigurationException extends Exception
{
    protected $code = ExceptionsConstants::CONFIGURATION_ERROR;
}