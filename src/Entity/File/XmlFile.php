<?php

namespace Evster\SitemapGenerator\Entity\File;

use DOMDocument;
use Evster\SitemapGenerator\Abstraction\AbstractFile;
use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Evster\SitemapGenerator\Constant\SitemapExtensionsConstants;
use Evster\SitemapGenerator\Entity\DTO\UrlItem;
use Evster\SitemapGenerator\Exception\FileProcessingException;

class XmlFile extends AbstractFile
{
    const XML_VERSION = '1.0';
    const XML_ENCODING = 'utf-8';

    /**
     * @var DOMDocument
     */
    protected DOMDocument $xml;

    /**
     * @param string $filePath
     * @throws FileProcessingException
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;

        $this->createFile($filePath);
        $this->xml = new DOMDocument(self::XML_VERSION, self::XML_ENCODING);
    }

    /**
     * @param array $urlSets
     * @return bool
     * @throws FileProcessingException
     */
    public function write(array $urlSets): bool
    {
        try {
            $root = $this->xml->createElement('urlset');

            $root->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
            $root->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
            $root->setAttribute('xsi:schemaLocation',
                'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

            $this->xml->appendChild($root);

            /** @var UrlItem $item */
            foreach ($urlSets as $item) {
                $childNode = $this->xml->createElement('url');

                foreach ($item->__toArray() as $key => $value) {
                    $urlAttribute = $this->xml->createElement($key, $value);

                    $childNode->appendChild($urlAttribute);
                }

                $root->appendChild($childNode);
            }

            return (bool)$this->xml->save($this->filePath);
        } catch (\Exception $ex) {
            throw new FileProcessingException(
                'File processing error.',
                ExceptionsConstants::FILE_ERROR,
                $ex
            );
        }
    }
}