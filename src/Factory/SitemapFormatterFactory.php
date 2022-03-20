<?php

namespace Evster\SitemapGenerator\Factory;

use Evster\SitemapGenerator\Abstraction\SitemapGenerator;
use Evster\SitemapGenerator\Constant\SitemapExtensionsConstants;
use Evster\SitemapGenerator\Entity\Generator\CsvGenerator;
use Evster\SitemapGenerator\Entity\Generator\JsonGenerator;
use Evster\SitemapGenerator\Entity\Generator\XmlGenerator;
use Evster\SitemapGenerator\Exception\UnsupportedExtensionException;

class SitemapFormatterFactory
{
    /**
     * @param string $itemType
     *
     * @return SitemapGenerator
     *
     * @throws UnsupportedExtensionException
     */
    public function create(string $itemType)
    {
        if ($itemType === SitemapExtensionsConstants::EXTENSION_XML) {
            return new XmlGenerator();
        } elseif ($itemType === SitemapExtensionsConstants::EXTENSION_JSON) {
            return new JsonGenerator();
        } elseif ($itemType === SitemapExtensionsConstants::EXTENSION_CSV) {
            return new CsvGenerator();
        }

        throw new UnsupportedExtensionException($itemType . ' is not supported extension.');
    }
}