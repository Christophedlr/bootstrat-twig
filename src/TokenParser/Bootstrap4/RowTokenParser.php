<?php


namespace Bootstrap\TokenParser\Bootstrap4;

use Bootstrap\Node\Bootstrap4\RowNode;
use Twig\Node\Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

/**
 * Parse the row tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class RowTokenParser extends AbstractTokenParser
{
    public function parse(Token $token): Node
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        /*Create empty Node for names & values*/
        $names = new Node();
        $values = new Node();

        /*If parameter is detected, search all names expression*/
        if ($stream->test(Token::NAME_TYPE)) {
            $names = $this->parser->getExpressionParser()->parseAssignmentExpression();

            /*If equal operator is detected in next search, search all valuues*/

            if ($stream->nextIf(Token::OPERATOR_TYPE, '=')) {
                $values = $this->parser->getExpressionParser()->parseMultitargetExpression();
            }
        }

        /*Expect end of tag*/
        $stream->expect(Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideRowEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new RowNode($names, $values, $body, $lineno, $this->getTag());
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
