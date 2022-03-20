<?php

namespace Evster\SitemapGenerator\Entity\Generator;

use Evster\SitemapGenerator\Abstraction\AbstractFile;
use Evster\SitemapGenerator\Abstraction\SitemapRecorder;
use Evster\SitemapGenerator\Entity\File\JsonFile;
use Evster\SitemapGenerator\Exception\FileProcessingException;

class JsonRecorder extends SitemapRecorder
{
    /**
     * @param string $filePath
     * @return AbstractFile
     * @throws FileProcessingException
     */
    protected function createFile(string $filePath): AbstractFile
    {
        $this->file = new JsonFile($filePath);

        return $this->file;
    }
}
