<?php


namespace Bootstrap\Node\Bootstrap4;

use Twig\Compiler;
use Twig\Node\Node;
use function PHPUnit\Framework\throwException;

/**
 * Compile Nodes of row tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class RowNode extends Node
{
    public function __construct(Node $names, Node $values, Node $body, int $lineno = 0, string $tag = null)
    {
        parent::__construct(['names' => $names, 'values' => $values, 'body' => $body], [], $lineno, $tag);
    }

    public function compile(Compiler $compiler): void
    {
        $row = 'row';
        $class = '';

        foreach ($this->getNode('names') as $id => $name) {
            $value = $this->getNode('values')->getIterator()[$id]->getAttribute('value');

            if ($name->getAttribute('name') === 'class') {
                $class .= $value;
            } else {
                throw new \LogicException(
                    sprintf(
                        'Attribute "%s" does not valid for container tag.',
                        $name->getAttribute('name'),
                        static::class
                    )
                );
            }
        }

        $compiler
            ->addDebugInfo($this)
            ->write(sprintf('echo "<div class=\"%s%s\">";', $row, (!empty($class) ? ' '.$class : '')))
            ->indent()
            ->subcompile($this->getNode('body'))
            ->write('echo "</div>";');
    }
}
