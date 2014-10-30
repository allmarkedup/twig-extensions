<?php namespace Amu\Twig\TwigMarkdown;

use Amu\Twig\TwigMarkdown\TwigMarkdownExtension as MarkdownExtension;

/**
 * @author Mark Perkins <mark@Amu.com>
 */
class MarkdownExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider markdownFilterTestProvider
     */
    public function testMarkdownFilter($template, $data, $expected)
    {
        $this->assertEquals($expected, $this->getTemplate($template)->render($data));
    }

    /**
     * @dataProvider markdownTagTestProvider
     */
    public function testMarkdownTag($template, $data, $expected)
    {
        $this->assertEquals($expected, $this->getTemplate($template)->render($data));
    }

    public function markdownFilterTestProvider()
    {
        return [
            ["{{ 'This is a **markdown** string' | markdown }}", [], "<p>This is a <strong>markdown</strong> string</p>"],
            ["{{ ('#My name is ' ~ name) | markdown }}", ['name' => 'Mark'], "<h1>My name is Mark</h1>"]
        ];
    }

    public function markdownTagTestProvider()
    {
        return [
            ["{% markdown %}This is a **markdown** string{% endmarkdown %}", [], "<p>This is a <strong>markdown</strong> string</p>"],
            ["{% markdown %}#My name is {{ name }}{% endmarkdown %}", ['name' => 'Mark'], "<h1>My name is Mark</h1>"]
        ];
    }

    protected function getTemplate($template)
    {
        $loader = new \Twig_Loader_Array(array(
            'test.html' => $template
        ));
        $twig = new \Twig_Environment($loader, [
            'cache' => false
        ]);
        $twig->addExtension(new MarkdownExtension());
        return $twig->loadTemplate('test.html');
    }
}
