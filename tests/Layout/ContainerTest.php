<?php


namespace Layout;

use Bootstrap\Extension\Bootstrap4Extension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class ContainerTest extends TestCase
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
     * {% container %}
     * {% endcontainer %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testContainer()
    {
        $result = $this->template->render('layout/container.html');

        $this->assertEquals("<div class=\"container\"></div>", $result);
    }

    /**
     * {% container type="fluid" %}
     * {% endcontainer %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testContainerFluid()
    {
        $result = $this->template->render('layout/container_fluid.html');

        $this->assertEquals("<div class=\"container-fluid\"></div>", $result);
    }

    /**
     * {% container class="custom-container" %}
     * {% endcontainer %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testContainerCustomContainerClass()
    {
        $result = $this->template->render('layout/container_class.html');

        $this->assertEquals("<div class=\"container custom-container\"></div>", $result);
    }

    /**
     * {% container class,type = "custom-container","xl" %}
     * {% endcontainer %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testContainerXlCustomContainerClass()
    {
        $result = $this->template->render('layout/container_xl_class.html');

        $this->assertEquals("<div class=\"container-xl custom-container\"></div>", $result);
    }

    /**
     * {% container attribute="test" %}
     * {% endcontainer %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testContainerInvalidAttribute()
    {
        $this->expectException(SyntaxError::class);
        $result = $this->template->render('layout/container_invalid.html');
    }
}
