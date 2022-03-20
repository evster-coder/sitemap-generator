<?php

namespace Evster\SitemapGenerator\Abstraction;

use Evster\SitemapGenerator\Exception\FileProcessingException;

abstract class AbstractFile
{
    /**
     * @var string
     */
    protected string $filePath;

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    abstract function write(array $urlSets);

    /**
     * @param string $filePath
     *
     * @return void
     *
     * @throws FileProcessingException
     */
    protected function createFile(string $filePath)
    {
        try {
            if (empty($filePath)) {
                throw new FileProcessingException('File path can not be empty.');
            }
            if (!file_exists($filePath)) {
                if (!file_exists(dirname($filePath))) {
                    mkdir(dirname($filePath), 0777, true);
                }
                touch($filePath);
            }
        } catch (\Exception $ex) {
            throw new FileProcessingException($ex->getMessage());
        }
    }
}
