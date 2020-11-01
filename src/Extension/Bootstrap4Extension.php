<?php


namespace Bootstrap\Extension;

use Bootstrap\TokenParser\Bootstrap4\ContainerTokenParser;
use Twig\Extension\AbstractExtension;

class Bootstrap4Extension extends AbstractExtension
{
    public function getTokenParsers()
    {
        return [
            new ContainerTokenParser(),
        ];
    }
}
