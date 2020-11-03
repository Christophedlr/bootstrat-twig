<?php


namespace Bootstrap\Extension;

use Bootstrap\TokenParser\Bootstrap4\BreadcrumbTokenParser;
use Bootstrap\TokenParser\Bootstrap4\ColTokenParser;
use Bootstrap\TokenParser\Bootstrap4\ContainerTokenParser;
use Bootstrap\TokenParser\Bootstrap4\RowTokenParser;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Bootstrap4Extension extends AbstractExtension
{
    public function getTokenParsers()
    {
        return [
            new ContainerTokenParser(),
            new RowTokenParser(),
            new ColTokenParser(),
            new BreadcrumbTokenParser(),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('breadcrumb', [$this, 'breadcrumbFunction'], ['is_safe' => ['html']]),
        ];
    }

    public function breadcrumbFunction(string $text, $url = '', bool $active = false)
    {
        $value = $text;

        if (!empty($url) && !$active) {
            $value = sprintf('<a href="%s">%s</a>', $url, $text);
        }

        return sprintf(
            "<li class=\"breadcrumb-item%s\"%s>%s</li>",
            ($active)?' active':'',
            ($active)?' aria-current="page"':'',
            $value
        );
    }
}
