<?php

namespace Evster\SitemapGenerator\Rule;

use DateTime;
use Evster\SitemapGenerator\Abstraction\AbstractRule;

class DateRule implements AbstractRule
{
    const DEFAULT_FORMAT = 'Y-m-d';

    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        $date = DateTime::createFromFormat(self::DEFAULT_FORMAT, $value);

        return $date && $date->format(self::DEFAULT_FORMAT) === $value;
    }

    public function message(): string
    {
        return 'Значение должно быть датой в формате ' . self::DEFAULT_FORMAT;
    }
}
