<?php

namespace Evster\SitemapGenerator\Rule;

use Evster\SitemapGenerator\Abstraction\AbstractRule;

class MaxFloatRule implements AbstractRule
{
    protected float $initialValue = 1;

    public function __construct(float $initialValue)
    {
        $this->initialValue = $initialValue;
    }

    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        return is_numeric($value) && $value <= $this->initialValue;
    }

    public function message(): string
    {
        return 'Значение должно быть не более ' . $this->initialValue;
    }
}
