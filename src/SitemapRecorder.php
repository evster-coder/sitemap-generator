<?php

namespace Evster\SitemapGenerator;

use Evster\SitemapGenerator\Abstraction\SitemapGenerator;
use Evster\SitemapGenerator\Config\ConfigHelper;
use Evster\SitemapGenerator\Constant\SitemapExtensionsConstants;
use Evster\SitemapGenerator\Entity\DTO\UrlItem;
use Evster\SitemapGenerator\Entity\Generator\CsvGenerator;
use Evster\SitemapGenerator\Entity\Generator\JsonGenerator;
use Evster\SitemapGenerator\Entity\Generator\XmlGenerator;
use Evster\SitemapGenerator\Exception\ConfigurationException;
use Evster\SitemapGenerator\Exception\FileProcessingException;
use Evster\SitemapGenerator\Exception\UnsupportedExtensionException;
use Evster\SitemapGenerator\Exception\ValidationException;
use Evster\SitemapGenerator\Factory\SitemapFormatterFactory;
use Evster\SitemapGenerator\Rule\DateRule;
use Evster\SitemapGenerator\Rule\FloatRule;
use Evster\SitemapGenerator\Rule\MaxFloatRule;
use Evster\SitemapGenerator\Rule\MinFloatRule;
use Evster\SitemapGenerator\Rule\StringRule;
use Evster\SitemapGenerator\Validator\AssociativeArrayValidator;

class SitemapRecorder
{
    /**
     * @var CsvGenerator|JsonGenerator|XmlGenerator
     */
    protected SitemapGenerator $fileWriter;

    /**
     * @var array
     */
    protected array $inputData;

    /**
     * @var string
     */
    protected string $filePath;

    /**
     * @var array
     */
    protected array $validationRules;

    /**
     * @param array $data
     * @param string $fileFormat
     * @param string $filePath
     *
     * @throws ConfigurationException
     * @throws UnsupportedExtensionException
     */
    public function __construct(
        array $inputData = [],
        string $fileFormat = SitemapExtensionsConstants::EXTENSION_XML,
        string $filePath = ''
    ) {
        $this->formValidationRules();

        $this->inputData = $inputData;
        $this->filePath = $filePath;
        $this->fileWriter = (new SitemapFormatterFactory())->create($fileFormat);
    }

    /**
     * @return bool
     *
     * @throws ConfigurationException
     * @throws ValidationException
     */
    public function createSitemap(): bool
    {
        return $this->fileWriter
            ->generate($this->parseData(), $this->filePath);
    }

    /**
     * @throws ConfigurationException
     */
    protected function formValidationRules()
    {
        $this->validationRules = [
            ConfigHelper::get('input_attributes.loc') => [new StringRule()],
            ConfigHelper::get('input_attributes.lastModified') => [new DateRule()],
            ConfigHelper::get('input_attributes.priority') => [
                new FloatRule(),
                new MinFloatRule(0),
                new MaxFloatRule(1),
            ],
            ConfigHelper::get('input_attributes.changeFrequency') => [new StringRule()],
        ];
    }

    /**
     * @return array
     *
     * @throws ConfigurationException
     * @throws ValidationException
     */
    protected function parseData(): array
    {
        $locAttribute = ConfigHelper::get('input_attributes.loc');
        $lastModAttribute = ConfigHelper::get('input_attributes.lastModified');
        $priorityAttribute = ConfigHelper::get('input_attributes.priority');
        $changeFreqAttribute = ConfigHelper::get('input_attributes.changeFrequency');

        $urlItems = [];

        foreach ($this->inputData as $line) {
            (new AssociativeArrayValidator())->validate($line, $this->validationRules);

            $urlItems[] = ((new UrlItem())
                ->setLoc($line[$locAttribute])
                ->setLastmod($line[$lastModAttribute])
                ->setPriority($line[$priorityAttribute])
                ->setChangefreq($line[$changeFreqAttribute])
            );
        }

        return $urlItems;
    }
}
