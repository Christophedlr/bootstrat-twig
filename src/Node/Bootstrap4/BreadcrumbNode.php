<?php


namespace Bootstrap\Node\Bootstrap4;

use Twig\Compiler;
use Twig\Error\SyntaxError;
use Twig\Node\Node;

/**
 * Compile Nodes of container tag
 * @package Bootstrap\TokenParser\Bootstrap4
 * @author Christophe Daloz - De Los Rios
 * @version 1.0
 * @license MIT
 */
class BreadcrumbNode extends Node
{
    public function __construct(Node $names, Node $values, Node $body, int $lineno = 0, string $tag = null)
    {
        parent::__construct(['names' => $names, 'values' => $values, 'body' => $body], [], $lineno, $tag);
    }

    public function compile(Compiler $compiler): void
    {
        $class = '';

        foreach ($this->getNode('names') as $id => $name) {
            $value = $this->getNode('values')->getIterator()[$id]->getAttribute('value');

            if ($name->getAttribute('name') === 'class') {
                $class = sprintf(' class=\"%s\"', $value);
            } else {
                throw new SyntaxError(
                    sprintf(
                        'Attribute "%s" does not valid for breadcrumb tag.',
                        $name->getAttribute('name'),
                        static::class
                    )
                );
            }
        }

        $compiler
            ->addDebugInfo($this)
            ->write(sprintf('echo "<nav aria-label=\"breadcrumb\"%s>";', $class))
            ->indent()
            ->write('echo "<ol class=\"breadcrumb\">";')
            ->indent()
            ->subcompile($this->getNode('body'))
            ->write('echo "</ol>";')
            ->write('echo "</nav>";');
    }
}
