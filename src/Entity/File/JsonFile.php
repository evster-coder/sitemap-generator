<?php

namespace Evster\SitemapGenerator\Entity\File;

use Evster\SitemapGenerator\Abstraction\AbstractFile;
use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Evster\SitemapGenerator\Entity\DTO\UrlItem;
use Evster\SitemapGenerator\Exception\FileProcessingException;

class JsonFile extends AbstractFile
{
    /**
     * @param string $filePath
     * @throws FileProcessingException
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;

        $this->createFile($filePath);
    }

    /**
     * @param array $urlSets
     * @return bool
     * @throws FileProcessingException
     */
    public function write(array $urlSets): bool
    {
        try {
            $fp = fopen($this->filePath, 'w');

            $items = [];

            /** @var UrlItem $line */
            foreach ($urlSets as $line) {
                $items[] = $line->__toArray();
            }

            return fwrite($fp, json_encode($items)) == count($items) && fclose($fp);

        } catch (\Exception $ex) {
            throw new FileProcessingException(
                $ex->getMessage(),
                ExceptionsConstants::FILE_ERROR,
                $ex
            );
        }
    }
}