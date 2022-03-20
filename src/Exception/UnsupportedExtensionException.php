<?php

namespace Evster\SitemapGenerator\Exception;

use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Exception;

class UnsupportedExtensionException extends Exception
{
    protected $code = ExceptionsConstants::UNSUPPORTED_FILE_EXTENSION;
}