<?php


namespace Bootstrap\Extension;

use Bootstrap\TokenParser\Bootstrap4\ColTokenParser;
use Bootstrap\TokenParser\Bootstrap4\ContainerTokenParser;
use Bootstrap\TokenParser\Bootstrap4\RowTokenParser;
use Twig\Extension\AbstractExtension;

class Bootstrap4Extension extends AbstractExtension
{
    public function getTokenParsers()
    {
        return [
            new ContainerTokenParser(),
            new RowTokenParser(),
            new ColTokenParser(),
        ];
    }
}
