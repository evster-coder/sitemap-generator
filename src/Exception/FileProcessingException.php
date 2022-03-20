<?php

namespace Evster\SitemapGenerator\Exception;

use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Exception;

class FileProcessingException extends Exception
{
    protected $code = ExceptionsConstants::FILE_ERROR;
}