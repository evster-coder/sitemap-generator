<?php

namespace Evster\SitemapGenerator\Abstraction;

use Evster\SitemapGenerator\Exception\FileProcessingException;

abstract class SitemapRecorder
{
    /**
     * @var AbstractFile
     */
    protected AbstractFile $file;

    /**
     * @param array $urlSets
     * @param string $filePath
     * @return bool
     * @throws FileProcessingException
     */
    public function generate(array $urlSets, string $filePath): bool
    {
        if (empty($urlSets)) {
            return false;
        }

        return $this->createFile($filePath)->write($urlSets);
    }

    /**
     * @param string $filePath
     * @return AbstractFile
     *
     * @throws FileProcessingException
     */
    abstract protected function createFile(string $filePath): AbstractFile;
}
