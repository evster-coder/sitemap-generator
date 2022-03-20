<?php

namespace Evster\SitemapGenerator\Factory;

use Evster\SitemapGenerator\Abstraction\SitemapRecorder;
use Evster\SitemapGenerator\Constant\SitemapExtensionsConstants;
use Evster\SitemapGenerator\Entity\Generator\CsvRecorder;
use Evster\SitemapGenerator\Entity\Generator\JsonRecorder;
use Evster\SitemapGenerator\Entity\Generator\XmlRecorder;
use Evster\SitemapGenerator\Exception\UnsupportedExtensionException;

class SitemapFormatterFactory
{
    /**
     * @param string $itemType
     *
     * @return SitemapRecorder
     *
     * @throws UnsupportedExtensionException
     */
    public function create(string $itemType)
    {
        if ($itemType === SitemapExtensionsConstants::EXTENSION_XML) {
            return new XmlRecorder();
        } elseif ($itemType === SitemapExtensionsConstants::EXTENSION_JSON) {
            return new JsonRecorder();
        } elseif ($itemType === SitemapExtensionsConstants::EXTENSION_CSV) {
            return new CsvRecorder();
        }

        throw new UnsupportedExtensionException($itemType . ' is not supported extension.');
    }
}