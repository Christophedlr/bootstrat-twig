<?php


namespace Bootstrap\TokenParser\Bootstrap4;

use Twig\Node\Node;
use Twig\TokenParser\AbstractTokenParser;
use Twig\Token;

/**
 * Abstract parse method for accept attributes
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
abstract class AbstractAcceptAttributesTokenParser extends AbstractTokenParser
{
    protected $endtag;
    protected $nodeClass;

    public function __construct(string $endtag, string $nodeClass)
    {
        $this->endtag = $endtag;
        $this->nodeClass = $nodeClass;
    }

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
        $body = $this->parser->subparse([$this, $this->endtag], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new $this->nodeClass($names, $values, $body, $lineno, $this->getTag());
    }
}
