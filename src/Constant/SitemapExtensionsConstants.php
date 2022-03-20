<?php

namespace Evster\SitemapGenerator\Constant;

final class SitemapExtensionsConstants
{
    const EXTENSION_XML = 'xml';
    const EXTENSION_JSON = 'json';
    const EXTENSION_CSV = 'csv';

    const EXTENSIONS_LIST = [
        self::EXTENSION_XML,
        self::EXTENSION_JSON,
        self::EXTENSION_CSV,
    ];
}
