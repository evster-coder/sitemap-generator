<?php

namespace Evster\SitemapGenerator\Validator;

use Evster\SitemapGenerator\Abstraction\AbstractRule;
use Evster\SitemapGenerator\Abstraction\AbstractValidator;
use Evster\SitemapGenerator\Exception\ValidationException;

class AssociativeArrayValidator implements AbstractValidator
{
    /**
     * @param $value
     * @param array $attributeValidators
     *
     * @return bool
     * @throws ValidationException
     */
    public function validate($value, array $attributeValidators): bool
    {
        foreach ($attributeValidators as $param => $rules) {
            /** @var AbstractRule[] $rules */
            foreach ($rules as $rule) {
                if (!isset($value[$param])) {
                    throw new ValidationException('Parameter ' . $param . ' is undefined.');
                }

                if (!$rule->validate($value[$param])) {
                    throw new ValidationException('Parameter ' . $param . ' - ' . $rule->message());
                }
            }
        }

        return true;
    }
}