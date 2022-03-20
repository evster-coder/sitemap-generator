<?php

namespace Evster\SitemapGenerator\Abstraction;

interface AbstractValidator
{
    /**
     * @param $value
     * @param array $attributeValidators
     *
     * @return bool
     */
    public function validate($value, array $attributeValidators): bool;
}
