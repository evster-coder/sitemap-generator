<?php

namespace Evster\SitemapGenerator\Exception;

use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Exception;

class ValidationException extends Exception
{
    protected $code = ExceptionsConstants::VALIDATION_ERROR;
}