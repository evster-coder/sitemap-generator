<?php

namespace Evster\SitemapGenerator\Rule;

use Evster\SitemapGenerator\Abstraction\AbstractRule;

class StringRule implements AbstractRule
{
    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        return is_string($value);
    }

    public function message(): string
    {
        return 'Значение должно быть строкой';
    }
}
