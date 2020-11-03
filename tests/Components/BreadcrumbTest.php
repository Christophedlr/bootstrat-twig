<?php


namespace Test\Components;

use Bootstrap\Extension\Bootstrap4Extension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class BreadcrumbTest extends TestCase
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
        $this->loader = new FilesystemLoader(__DIR__ . "/../templates");
        $this->template = new Environment($this->loader, ['cache' => false]);

        $this->template->addExtension(new Bootstrap4Extension());
    }

    /**
     * {% breadcrumb %}
     * {% endbreadcrumb %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testBreadcrumbTag()
    {
        $expected = "<nav aria-label=\"breadcrumb\">";
        $expected .= "<ol class=\"breadcrumb\">";
        $expected .= "</ol>";
        $expected .= "</nav>";
        $result = $this->template->render('components/breadcrumb/tag.html');

        $this->assertEquals($expected, $result);
    }

    /**
     * {% breadcrumb class="other-class" %}
     * {% endbreadcrumb %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testBreadcrumbTagCss()
    {
        $expected = "<nav aria-label=\"breadcrumb\" class=\"other-class\">";
        $expected .= "<ol class=\"breadcrumb\">";
        $expected .= "</ol>";
        $expected .= "</nav>";
        $result = $this->template->render('components/breadcrumb/tag_css.html');

        $this->assertEquals($expected, $result);
    }

    /**
     * {% breadcrumb type="bouwaaa" %}
     * {% endbreadcrumb %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testBreadcrumbTagInvalid()
    {
        $this->expectException(SyntaxError::class);
        $result = $this->template->render('components/breadcrumb/tag_invalid.html');
    }
}
