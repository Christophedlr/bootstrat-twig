<?php


namespace Bootstrap\TokenParser\Bootstrap4;

use Bootstrap\Node\Bootstrap4\ColNode;
use Twig\Token;

/**
 * Parse the col tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class ColTokenParser extends AbstractAcceptAttributesTokenParser
{
    public function __construct()
    {
        parent::__construct('decideColEnd', ColNode::class);
    }

    public function getTag()
    {
        return 'col';
    }

    public function decideColEnd(Token $token): bool
    {
        return $token->test('endcol');
    }
}
