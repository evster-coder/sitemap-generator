<?php

namespace Evster\SitemapGenerator\Entity\Generator;

use Evster\SitemapGenerator\Abstraction\AbstractFile;
use Evster\SitemapGenerator\Abstraction\SitemapGenerator;
use Evster\SitemapGenerator\Entity\File\XmlFile;
use Evster\SitemapGenerator\Exception\FileProcessingException;

class XmlGenerator extends SitemapGenerator
{
    /**
     * @param string $filePath
     * @return AbstractFile
     * @throws FileProcessingException
     */
    public function createFile(string $filePath): AbstractFile
    {
        $this->file = new XmlFile($filePath);

        return $this->file;
    }
}
