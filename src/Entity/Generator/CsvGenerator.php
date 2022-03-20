<?php

namespace Evster\SitemapGenerator\Entity\Generator;

use Evster\SitemapGenerator\Abstraction\AbstractFile;
use Evster\SitemapGenerator\Abstraction\SitemapGenerator;
use Evster\SitemapGenerator\Entity\File\CsvFile;
use Evster\SitemapGenerator\Exception\FileProcessingException;

class CsvGenerator extends SitemapGenerator
{
    /**
     * @param string $filePath
     * @return AbstractFile
     * @throws FileProcessingException
     */
    public function createFile(string $filePath): AbstractFile
    {
        $this->file = new CsvFile($filePath);

        return $this->file;
    }

}
