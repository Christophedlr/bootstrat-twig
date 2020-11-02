<?php


namespace Layout;

use Bootstrap\Extension\Bootstrap4Extension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class ColTest extends TestCase
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
     * {% col %}
     * {% endcol %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testCol()
    {
        $result = $this->template->render('layout/col.html');

        $this->assertEquals("<div class=\"col\"></div>", $result);
    }

    /**
     * {% col type="sm" %}
     * {% endcol %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testColType()
    {
        $result = $this->template->render('layout/col_type.html');

        $this->assertEquals("<div class=\"col-sm-10\"></div>", $result);
    }

    /**
     * {% col class="col-xxl-10" %}
     * {% endcol %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testColClass()
    {
        $result = $this->template->render('layout/col_class.html');

        $this->assertEquals("<div class=\"col col-xxl-10\"></div>", $result);
    }

    /**
     * {% col type,class="10","col-xxl-10" %}
     * {% endcol %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testColTypeClass()
    {
        $result = $this->template->render('layout/col_type_class.html');

        $this->assertEquals("<div class=\"col-10 col-xxl-10\"></div>", $result);
    }

    /**
     * {% col invalid="true" %}
     * {% endcol %}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testColInvalid()
    {
        $this->expectException(SyntaxError::class);
        $result = $this->template->render('layout/col_invalid.html');
    }
}
