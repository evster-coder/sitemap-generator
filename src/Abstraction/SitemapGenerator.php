<?php

namespace Evster\SitemapGenerator\Abstraction;

abstract class SitemapGenerator
{
    /**
     * @var AbstractFile
     */
    protected AbstractFile $file;

    /**
     * @param array $urlSets
     * @param string $filePath
     * @return bool
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
     *
     * @return AbstractFile
     */
    abstract protected function createFile(string $filePath): AbstractFile;
}
