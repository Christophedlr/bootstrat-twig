<?php


namespace Bootstrap\TokenParser\Bootstrap4;

use Bootstrap\Node\Bootstrap4\BreadcrumbNode;
use Twig\Token;

/**
 * Parse the breadcrumb tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class BreadcrumbTokenParser extends AbstractAcceptAttributesTokenParser
{
    public function __construct()
    {
        parent::__construct('decideBreadcrumbEnd', BreadcrumbNode::class);
    }

    public function getTag()
    {
        return 'breadcrumb';
    }

    public function decideBreadcrumbEnd(Token $token): bool
    {
        return $token->test('endbreadcrumb');
    }
}
