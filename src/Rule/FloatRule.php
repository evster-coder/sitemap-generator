<?php

namespace Evster\SitemapGenerator\Rule;

use Evster\SitemapGenerator\Abstraction\AbstractRule;

class FloatRule implements AbstractRule
{
    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        return is_numeric($value);
    }

    public function message(): string
    {
        return 'Значение должно быть числом';
    }

}
