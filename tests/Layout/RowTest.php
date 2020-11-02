<?php


namespace Layout;

use Bootstrap\Extension\Bootstrap4Extension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class RowTest extends TestCase
{
    /**
     * @var FilesystemLoader
     */
    protected $loader;

    /**
     * @var Environment
     */
    protected $template;

    protected function setUp(): void
    {
        $this->loader = new FilesystemLoader(__DIR__."/../templates");
        $this->template = new Environment($this->loader, ['cache' => false]);

        $this->template->addExtension(new Bootstrap4Extension());
    }

    /**
     * {% row %}
     * {% endrow %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testRow()
    {
        $result = $this->template->render('layout/row.html');

        $this->assertEquals("<div class=\"row\"></div>", $result);
    }

    /**
     * {% row class="row-cols-2" %}
     * {% endrow %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testRowClass()
    {
        $result = $this->template->render('layout/row_class.html');

        $this->assertEquals("<div class=\"row row-cols-2\"></div>", $result);
    }

    /**
     * {% row type="-cols-2" %}
     * {% endrow %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testRowInvalid()
    {
        $this->expectException(SyntaxError::class);
        $result = $this->template->render('layout/row_invalid.html');
    }
}
