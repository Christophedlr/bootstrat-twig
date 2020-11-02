<?php


namespace Bootstrap\TokenParser\Bootstrap4;

use Bootstrap\Node\Bootstrap4\ContainerNode;
use Twig\Token;

/**
 * Parse the container tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class ContainerTokenParser extends AbstractAcceptAttributesTokenParser
{
    public function __construct()
    {
        parent::__construct('decideContainerEnd', ContainerNode::class);
    }

    public function getTag()
    {
        return 'container';
    }

    public function decideContainerEnd(Token $token): bool
    {
        return $token->test('endcontainer');
    }
}
