<?php

namespace Evster\SitemapGenerator\Entity\File;

use Evster\SitemapGenerator\Abstraction\AbstractFile;
use Evster\SitemapGenerator\Constant\ExceptionsConstants;
use Evster\SitemapGenerator\Entity\DTO\UrlItem;
use Evster\SitemapGenerator\Exception\FileProcessingException;

class CsvFile extends AbstractFile
{
    const DEFAULT_SEPARATOR = ';';

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
        $headerArray = [
            'loc',
            'lastmod',
            'priority',
            'changefreq',
        ];

        try {
            $fp = fopen($this->filePath, 'w');

            fputcsv($fp, $headerArray, self::DEFAULT_SEPARATOR);

            /** @var UrlItem $line */
            foreach ($urlSets as $line) {
                fputcsv($fp, array_values($line->__toArray()), self::DEFAULT_SEPARATOR);
            }

            return fclose($fp);
        } catch (\Exception $ex) {
            throw new FileProcessingException(
                $ex->getMessage(),
                ExceptionsConstants::FILE_ERROR,
                $ex
            );
        }
    }
}