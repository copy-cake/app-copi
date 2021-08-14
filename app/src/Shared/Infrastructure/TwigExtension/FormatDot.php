<?php

namespace App\Shared\Infrastructure\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class FormatDot extends AbstractExtension
{
    public function getFunctions()
    {
        return[
          new TwigFunction('formatDot', [$this, 'formatDotOnComma'])
        ];
    }

    public function formatDotOnComma(string $salaryToFormat)
    {
        return str_replace('.', ',', $salaryToFormat);
    }
}