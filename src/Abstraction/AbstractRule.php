<?php

namespace Evster\SitemapGenerator\Abstraction;

interface AbstractRule
{
    public function validate($value): bool;

    public function message(): string;
}
