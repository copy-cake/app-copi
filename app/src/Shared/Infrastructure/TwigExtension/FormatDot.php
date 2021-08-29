<?php

namespace App\Shared\Infrastructure\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FormatDot extends AbstractExtension
{
    public function getFunctions()
    {
        return[
          new TwigFilter('moneyFormat', [$this, 'formatDotOnComma'])
        ];
    }

    public function formatDotOnComma(string $salaryToFormat)
    {
        return str_replace('.', ',', $salaryToFormat);
    }
}