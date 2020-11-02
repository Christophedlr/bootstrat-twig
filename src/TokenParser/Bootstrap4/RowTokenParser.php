<?php


namespace Bootstrap\TokenParser\Bootstrap4;

use Bootstrap\Node\Bootstrap4\RowNode;
use Twig\Token;

/**
 * Parse the row tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class RowTokenParser extends AbstractAcceptAttributesTokenParser
{
    public function __construct()
    {
        parent::__construct('decideRowEnd', RowNode::class);
    }

    public function getTag()
    {
        return 'row';
    }

    public function decideRowEnd(Token $token): bool
    {
        return $token->test('endrow');
    }
}
